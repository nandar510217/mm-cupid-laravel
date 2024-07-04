<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{

    public function getUserInfoByUsername(string $username);
    public function getRolePermissionByRoleId(int $role);
    public function getUsers();
    public function store(array $data);
    public function getUserById(int $id);

}
