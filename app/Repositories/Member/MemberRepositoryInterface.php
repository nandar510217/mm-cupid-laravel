<?php

namespace App\Repositories\Member;

interface MemberRepositoryInterface
{

    public function register(array $data);
    public function uploadMemberGallery(array $data);


}
