<?php

namespace App\Repositories\Setting;

use App\Constant;
use App\Models\Cities;
use App\Models\Setting;
use App\Models\User;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SettingRepository implements SettingRepositoryInterface
{
    public function getSetting()
    {
        $setting = Setting::first();
        return $setting;
    }

    public function update(array $data)
    {
        $returnedArray  = [];
        $point = $data['point'];
        $company_name = $data['company_name'];
        $company_email = $data['company_email'];
        $company_phone = $data['company_phone'];
        $company_address = $data['company_address']; 
        $parmObj = Setting::first(); 
        $update = [];
        $update['point'] = $point;
        $update['company_name'] = $company_name;
        $update['company_email'] = $company_email;
        $update['company_phone'] = $company_phone;
        $update['company_address'] = $company_address;
        if(isset($data['company_logo']) && $data['company_logo']->isValid()){
            $file = $data['company_logo'];
            $unique_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "." . date('Ymd_His') . "_" .
            uniqid() . "." . $file->getClientOriginalExtension();
            $destination_path = storage_path('app/public/images');
            if (!File::exists($destination_path)) {
                File::makeDirectory($destination_path, 0755, true);
            }
            $file->storeAs('images', $unique_name , 'public');
            $old_image_path = "images/" . $parmObj->company_logo;
            Storage::disk('public')->delete($old_image_path); 
            $update['company_logo'] = $unique_name;
            
        }
        $update_data = Utility::addUpdatedBy($update);
        $result = $parmObj->update($update_data);
        if($result) {
            $returnedArray['status'] = ReturnMessage::OK;
        }else {
            $returnedArray['status'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returnedArray;
    }

}
