<?php

namespace App\Repositories\Setting;

interface SettingRepositoryInterface
{

    public function getSetting();
    public function update(array $data);
}
