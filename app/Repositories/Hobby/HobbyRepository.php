<?php

namespace App\Repositories\Hobby;
use App\Models\Hobbies;
use App\ReturnMessage;
use App\Utility;
use App\ReturnMessages;
use Illuminate\Support\Facades\DB;

class HobbyRepository implements HobbyRepositoryInterface
{
    public function getHobbies()
    {
        $hobbies = Hobbies::select('id', 'name')
            ->whereNull('deleted_at')
            ->get();
        return $hobbies;
        
    }

    public function getHobbyById(int $id)
    {
        $hobby = Hobbies::find($id);
        return $hobby;
    }

    public function store(array $data){
        $returnarray =[];
        $insert =[];
        $insert['name'] = $data['name'];
        $paramObj       = Utility::addCreatedBy($insert);
        $result =Hobbies::create($paramObj);
        if($result){
            $returnarray['status'] = ReturnMessage::OK;
        }else{
            $returnarray['status'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returnarray;

    }

    // public function update(array $data)
    // {
    //     $returnarray =[];
    //     $id = $data['id'];
    //     $hobbyname = $data['hobbyname'];
    //     $update = [];
    //     $update['name'] = $hobbyname;
    //     $data = Utility::addUpdatedBy($update);
    //     $paramObj = Hobbies::find($id);
    //     $result = $paramObj->update($data);
    //     if($result){
    //         $returnarray['status'] = ReturnMessages::OK;
    //     }else{
    //         $returnarray['status'] = ReturnMessages::INTERNAL_SERVER_ERROR;
    //     }
    //     return $returnarray;
    // }
}
