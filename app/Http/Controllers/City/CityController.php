<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityUpdateRequest;
use App\Repositories\City\CityRepositoryInterface;
use App\Http\Requests\CityStoreRequest;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class CityController extends Controller
{
    private $cityRepository;
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
        DB::connection()->enableQuerylog();

    }
    public function index() {
        // dd("aa");
        try{
            $cities = $this->cityRepository->getCities();
            $queryLog = DB::getQueryLog();
            // dd($queryLog);
            Utility::saveDebugLog("CityController::index - \n", $queryLog);
            return view('backend.city.index', compact(
                ['cities']
            ));
        }catch(\Exception $e) {
            Utility::saveErrorLog("CityController::index - \n", $e->getMessage());
            abort(500);
        }      
    }
    public function create() {
        // dd("aa");
        try{
            return view('backend.city.form');
        }catch(\Exception $e) {
            Utility::saveErrorLog("CityController::create - \n", $e->getMessage());
            abort(500);
        }
    }
    public function store(CityStoreRequest $request) {
        // dd($request->all());
        try{
            $result = $this->cityRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::store - \n", $queryLog);
            if($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/city/index')->with('success_msg', 'City create success.');
            }else{
                return redirect('admin-backend/city/index')->with('error_msg', 'City create fail.');
            }
        }catch(\Exception $e) {
            Utility::saveErrorLog("CityController::store - \n", $e->getMessage());
            abort(500);
        }        
    }

    public function edit(int $id) {
        try{
            $city = $this->cityRepository->getCityById((int) $id);
            if($city == null){
                abort(404);
            }
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::edit - \n", $queryLog);
            return view('backend.city.form',compact([
                'city'
            ]));
        }catch(\Exception $e) {
            // Utility::saveDebugLog("CityController::edit - \n", $e->getMessage());
            // dd($e->getCode());
            if($e->getCode() == 0) {
                abort(404);
            }
            Utility::saveErrorLog("CityController::edit - \n", $e->getMessage());
            abort(500);
        }       
    }

    public function update(CityUpdateRequest $request)
    {
        // dd($request->all());
        try{
            $result = $this->cityRepository->update((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("CityController::update - \n", $queryLog);
            if($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/city/index')->with('success_msg', 'City update success.');
            }else{
                return redirect('admin-backend/city/index')->with('error_msg', 'City update fail.');
            }
        }catch(\Exception $e) {
            Utility::saveErrorLog("CityController::update - \n", $e->getMessage());
            abort(500);
        }
    }
}
