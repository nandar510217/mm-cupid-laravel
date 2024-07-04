<?php

namespace App\Http\Controllers\Hobby;

use App\Http\Controllers\Controller;
use App\Http\Requests\HobbyStoreRequest;
use App\Repositories\Hobby\HobbyRepositoryInterface;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HobbyController extends Controller
{
    private $hobbyRepository;
    public function __construct(HobbyRepositoryInterface $hobbyRepository){
        $this->hobbyRepository = $hobbyRepository;
        DB::connection()->enableQuerylog();
    }

    public function index()
    {
        try{
            $hobbies = $this->hobbyRepository->getHobbies();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::index - \n",$queryLog);
            return view('backend.hobby.index',compact(
                ['hobbies']
            ));
        }catch(\Exception $e){
            Utility::saveErrorLog("HobbyController::index - \n",$e->getMessage());
            abort(500);
        }  
    }

    public function create()
    {
        return view('backend.hobby.form');
    }

    public function store(HobbyStoreRequest $request)
    {
        try{
            $result = $this->hobbyRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("HobbyController::store- \n",$queryLog);
               if($result['status'] == ReturnMessage::OK) {
                    return redirect('admin-backend/hobby/index')->with('success_msg','Hobby stored successfully');
                  
                }else{
                    return redirect('admin-backend/hobby/index')->with('error_msg','Hobby stored failed!');
                }
            }catch(\Exception $e){
                Utility::saveErrorLog("HobbyController::store - \n",$e->getMessage());
                abort(500);
            }
            // dd($request->all());
    }


}
