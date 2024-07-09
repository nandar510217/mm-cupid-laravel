<?php

namespace App\Http\Controllers\Member;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PostLoginRequest;
use App\Http\Requests\PostRegisterRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\HobbyResource;
use App\Http\Resources\MemberResource;
use App\Mail\RegistrationConfirmMail;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Http\Resources\CityResource;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    private $cityRepository;
    private $memberRepository;
    private $settingRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        HobbyRepositoryInterface $hobbyRepository,
        SettingRepositoryInterface $settingRepository,
        MemberRepositoryInterface $memberRepository
        )
    {
        $this->cityRepository = $cityRepository;
        $this->hobbyRepository = $hobbyRepository;
        $this->settingRepository = $settingRepository;
        $this->memberRepository = $memberRepository;
        DB::connection()->enableQuerylog();
    }

    public function register(){
        return view('frontend.register');
    }
    public function login(){
        // if(Auth::guard('member')->user() != null){
        //     return redirect('index');
        // }
        return view('frontend.login');
    }

    public function postRegister(PostRegisterRequest $request){
        $result = $this->memberRepository->uploadMemberGallery((array) $request->all());
        if($result['status'] == ReturnMessage::OK){
            // $mailData = [
            //     'company_name' => 'company name',
            // ];
            $setting = $this->settingRepository->getSetting();
            $member = $this->memberRepository->getMemberById((int) $request->get('member-id'));
            $mailData['setting'] = $setting;
            $mailData['member']  = $member;
            Mail::to($member->email)->send(new RegistrationConfirmMail($mailData));
            return redirect('login')->with('succ_msg', 'Your registration is succeess.Please confirm your email. Open the email and click Confirm your email.');
        }else {
            return redirect('login')->with('succ_msg', 'Your registration is fail. Please try again.');
        }
    }

    public function postLogin(PostLoginRequest $request){
       
        $email = $request->get('email');
        $password = $request->get('password');
        $userInfo = $this->memberRepository->getUserinfoByEmail((string) $email);
        if ($userInfo != null) {
            if(!Hash::check($password,$userInfo->password)) { 
                return redirect()
                ->back()
                ->with(['err_msg' => 'Wrong Password!'])
                ->withInput();
            } elseif ($userInfo->status == Constant::MEMBER_BANNED) {
                return redirect()
                ->back()
                ->with(['err_msg' => 'You have been banned from admin team!'])
                ->withInput();
            } elseif ($userInfo->deleted_at != null) {
                return redirect()
                ->back()
                ->with(['err_msg' => 'You have been deleted from admin team!'])
                ->withInput();
            } else {
                dd('correct');
                $credentials = Auth::guard('member')->attempt([
                        'email'     => $email,
                        'password' => $password
                ]);
                if ($credentials) {
                    // dd('ss');
                    return redirect('index');
                } else {
                    return redirect()
                        ->back()
                        ->with(['err_msg' => 'Login Fail for unexpected error!.Contact admin team.']);
                }
            }       
        } else {
            return redirect()
                ->back()
                ->with(['err_msg' => 'Invalid Email.'])
                ->withInput();//old data kyn kae ag
        }
    }

    public function apiGetCities(){
        $cities = $this->cityRepository->getCities();
        // dd($cities);
        return CityResource::collection($cities);
    }

    public function apiGetHobbies(){
        $hobbies = $this->hobbyRepository->getHobbies();    
        return HobbyResource::collection($hobbies);
    }

    public function apiRegister(UserRegisterRequest $request) {
        // dd($request->all());
        $result = $this->memberRepository->register((array) $request->all());
        if($result['status'] == ReturnMessage::OK){
            $data = $result['data'];
            return new MemberResource($data);
        } else {
            return response()->json([
                'success' => false,
            ], ReturnMessage::INTERNAL_SERVER_ERROR);
        }
    }
}





   



    // public function index()
    // {
    //     return view('frontend.index');
    // }


    // public function logout()
    // {
    //     Auth::guard('member')->logout();
    //     return redirect('login');
    // }

    // public function apiSyncMembers(ApiSyncMembersRequest $request)
    // {
    //     $members = $this->memberRepository->apiSyncMembers((array) $request->all());
    //     return SyncMemberResource::collection($members);
    // }


