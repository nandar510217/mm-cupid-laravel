<?php

namespace App\Repositories\Member;

use App\Constant;
use App\Models\Members;
use App\Models\MemberHobbies;
use App\Models\MembersGallery;
use App\Models\User;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Imgae;

class MemberRepository implements MemberRepositoryInterface
{
    protected $settingRepository;
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }
    public function register(array $data)
    {
        $returnArray = array();
        DB::beginTransaction();
        try{
            $insert_data = [];
            $insert_data['username']           = $data['username'];
            $insert_data['email']              = $data['email'];
            $insert_data['password']           = bcrypt($data['password']);
            $insert_data['gender']             = $data['gender'];
            $insert_data['phone']              = $data['phone'];
            $insert_data['email_confirm_code'] = self::generateEmailConfirmCode();
            $insert_data['date_of_birth']      = Utility::convertmdYmdFormat($data['birthday']);
            $insert_data['education']          = $data['education'];
            $insert_data['city_id']            = $data['city'];
            $insert_data['work']               = $data['work'];
            $insert_data['height_feet']        = $data['feet'];
            $insert_data['height_inches']      = $data['inches'];
            $insert_data['status']             = Constant::MEMBER_EMAIL_UNVERIFY;
            $insert_data['religion']           = $data['religion'];
            $insert_data['about']              = $data['about'];
            $insert_data['partner_gender']     = $data['partner_gender'];
            $insert_data['partner_min_age']    = $data['min_age'];
            $insert_data['partner_max_age']    = $data['max_age'];
            $insert_data['point']              = $this->settingRepository->getSetting()->point;

            $member = Members::create($insert_data);
            foreach($data['hobbies'] as $hobby){
                $hobby_ins_data = [];
                $hobby_ins_data['member_id']  = $member->id;
                $hobby_ins_data['hobby_id']   = $hobby;
                $hobby_ins_data['created_by'] = $member->id;
                $hobby_ins_data['updated_by'] = $member->id;
                MemberHobbies::create($hobby_ins_data);
                
            }
            DB::commit();
            $returnArray['status'] = ReturnMessage::OK;
            $returnArray['data'] = $member;
            return $returnArray;
            // dd($member->id);
        }catch(\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function uploadMemberGallery(array $data) {
        for($i= 1;$i <= 6 ;$i++){
            if(isset($data['upload' . $i]) && $data['upload' . $i]->isValid()){
                $file = $data['upload' . $i];
                $unique_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "." . date('Ymd_His') . "_" .
                uniqid() . "." . $file->getClientOriginalExtension();
                $destination_path = storage_path('app/public/upload/' . $data['member-id']);
                if (!File::exists($destination_path)) {
                    File::makeDirectory($destination_path, 0755, true);
                }
                $file->storeAs('upload/' . $data['member-id'], $unique_name, 'public');
                $ins_data = [];
                $ins_data['name'] = $unique_name;
                $ins_data['sort'] = $i;
                $ins_data['member_id'] = $data['member-id'];
                $ins_data['created_by'] = $data['member-id'];
                $ins_data['updated_by'] = $data['member-id'];
                MembersGallery::create($ins_data);
                
            }
        }
    }

    protected static function generateEmailConfirmCode() 
    {
        $unique_number = uniqid();
        $current_datetime = date('Y-m-d H:i:s');
        $data_to_hash = $current_datetime . $unique_number;
        $md5_hash = md5($data_to_hash);
        return $md5_hash;
    }



}
