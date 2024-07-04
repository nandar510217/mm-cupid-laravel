<?php

namespace App\Repositories\City;

use App\Models\Cities;
use Illuminate\Support\Facades\DB;
use App\Utility;
use App\ReturnMessage;
class CityRepository implements CityRepositoryInterface
{
    public function store(array $data){
        $returnedArray  = [];
        $insert         = [];
        $insert['name'] = $data['name'];
        $paramObj = Utility::addCreatedBy($insert);
        $result   = Cities::create($paramObj);
        if($result) {
            $returnedArray['status'] = ReturnMessage::OK;
        }else {
            $returnedArray['status'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returnedArray;
    }

    public function getCities(){
        $cities = Cities::SELECT ("id","name")
                    ->whereNull('deleted_at')
                    ->get();
        return $cities;
        
    }

    public function getCityById(int $id) {
        $city = Cities::find($id);
        return $city;
    }

    public function update(array $data) {
        $returnedArray = [];
        $id = $data['id'];
        $name = $data['name'];
        $update = [];
        $update['name'] = $name;
        $data = Utility::addUpdatedBy($update);
        $parmObj = Cities::find($id);
        $result = $parmObj->update($data);
        if($result) {
            $returnedArray['status'] = ReturnMessage::OK;
        }else {
            $returnedArray['status'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returnedArray;
    }
    
}
