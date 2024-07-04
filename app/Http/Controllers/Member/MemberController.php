<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRegisterRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\HobbyResource;
use App\Http\Resources\MemberResource;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Http\Resources\CityResource;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    private $cityRepository;
    private $memberRepository;
    public function __construct(
        CityRepositoryInterface $cityRepository,
        HobbyRepositoryInterface $hobbyRepository,
        MemberRepositoryInterface $memberRepository
        )
    {
        $this->cityRepository = $cityRepository;
        $this->hobbyRepository = $hobbyRepository;
        $this->memberRepository = $memberRepository;
        DB::connection()->enableQuerylog();
    }

    public function register(){
        return view('frontend.register');
    }
    public function postRegister(PostRegisterRequest $request){
        $result = $this->memberRepository->uploadMemberGallery((array) $request->all());
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
