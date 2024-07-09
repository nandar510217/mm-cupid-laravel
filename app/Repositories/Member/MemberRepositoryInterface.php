<?php

namespace App\Repositories\Member;

interface MemberRepositoryInterface
{

    public function register(array $data);
    public function uploadMemberGallery(array $data);
    public function getMemberById(int $id);
    public function getUserinfoByEmail(string $email);

    

}
