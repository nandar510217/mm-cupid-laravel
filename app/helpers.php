<?php
use App\Constant;

if (!file_exists('getMembersNameByCity')) {
    function getMembersNameByCity($getMemberByCity)
    {
        // dd($getMemberByCity);
        $res_member = '';
        foreach ($getMemberByCity as $member) {
            $res_member .= $member->username . ",";
        }
        $res_member = rtrim($res_member, ',');
        return $res_member;
    }
}

if (!file_exists('showPermission')) {
    function showPermission($routeGroup)
    {
        $permissions = Session::get('permission');
        foreach($permissions as $permission){
            if($permission->name == $routeGroup)
            return '';
        }
        return 'none';
    }
}

if (!file_exists('getUserRole')) {
    function getUserRole($roleName)
    {
        if($roleName == 'admin') {
            return Constant::ADMIN_ROLE;
        } elseif($roleName == 'editor'){
            return Constant::EDITOR_ROLE;
        }else{
            return Constant::CUSTOMER_SERVICE;
        }
    }
}

// if (!function_exists('getRoleName')) {
//     function getRoleName($roleId)
//     {
//         switch ($roleId) {
//             case Constant::ADMIN_ROLE:
//                 return 'Admin';
//             case Constant::EDITOR_ROLE:
//                 return 'Editor';
//             case Constant::CUSTOMER_SERVICE:
//                 return 'Customer Service';
//             default:
//                 return 'Unknown Role';
//         }
//     }
// }
