<?php

namespace App\Repositories\User;

use App\Constant;
use App\Models\Cities;
use App\Models\User;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    // public function test()
    // {
    //     return "aaa";
    // }

    public function getUserInfoByUsername(string $username)
    {
        $userInfo = User::SELECT("password", "status", "deleted_at")
                    ->where('username', '=', $username)
                    ->first();
        return $userInfo;
    }

    public function getRolePermissionByRoleId(int $role)
    {
        $route_permission = DB::SELECT("SELECT name FROM `route_permission` WHERE role='$role'");
        return $route_permission;
    }

    public function getUsers(){
        $users = User::select("id", "username", "role", "status")
                ->selectRaw("
                    CASE 
                        WHEN role = " . Constant::ADMIN_ROLE . " THEN 'admin' 
                        WHEN role = " . Constant::EDITOR_ROLE . " THEN 'editor' 
                        WHEN role = " . Constant::CUSTOMER_SERVICE . " THEN 'customer service' 
                        ELSE 'unknown' 
                    END as role_name,
                    CASE 
                        WHEN status = 0 THEN 'enable' 
                        WHEN status = 1 THEN 'disable' 
                        ELSE 'unknown' 
                    END as status_name
                ")
                ->whereNull('deleted_at')
                ->get();

        return $users;
    }

    public function store(array $data){
        $returnedArray  = [];
        $insert         = [];
        $insert['username'] = $data['username'];
        $insert['password'] = bcrypt($data['password']);
        $insert['role'] = $data['role'];
        $insert['status'] = Constant::ADMIN_ENABLE_STATUS;
        $paramObj = Utility::addCreatedBy($insert);
        // dd($paramObj);
        $result   = User::create($paramObj);
        if($result) {
            $returnedArray['status'] = ReturnMessage::OK;
        }else {
            $returnedArray['status'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returnedArray;
    }

    public function getUserById(int $id){
        $user = User::find($id);
        return $user;
    }

}
