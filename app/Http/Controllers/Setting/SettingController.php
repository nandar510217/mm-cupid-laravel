<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    private $settingRepository;
    public function __construct(SettingRepositoryInterface $settingRepository){
        $this->settingRepository = $settingRepository;
        DB::connection()->enableQuerylog();
    }
    public function index() {
        try{
            $setting = $this->settingRepository->getSetting();
            // dd($setting);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::index - \n", $queryLog);
            return view('backend.setting.index', compact([
                'setting'
            ]));
        }catch(\Exception $e) {
            
            Utility::saveErrorLog("SettingController::index - \n", $e->getMessage());
            abort(500);
        }      
    }

    public function edit() {
        try{
            $setting = $this->settingRepository->getSetting();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::edit - \n", $queryLog);
            if($setting == null){
                abort(404);
            }
            return view('backend.setting.form', compact(['setting']));
        }catch(\Exception $e) {
            if($e->getCode() == 0){
                abort(404);
            }
            Utility::saveErrorLog("SettingController::edit - \n", $e->getMessage());
            abort(500);
        }
    }

    public function update(SettingUpdateRequest $request) {
        try{
            $result = $this->settingRepository->update($request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("SettingController::update - \n", $queryLog);
    
            if($result['status'] == ReturnMessage::OK){
                return redirect('admin-backend/setting/index')->with('success_msg', 'Setting update success.');
            }else{
                return redirect('admin-backend/setting/index')->with('success_msg', 'Setting update fail.');
            }
        }catch(\Exception $e) {
            // if($e->getCode() == 0){
            //     abort(404);
            // }
            Utility::saveErrorLog("SettingController::update - \n", $e->getMessage());
            abort(500);
        }
    }
    
}
