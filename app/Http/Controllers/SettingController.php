<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::SELECT("id", "point", "company_name", "company_logo", "company_phone", "company_address")
                    ->get();
        return view('test.setting', compact([
            'setting',
        ]));
    }
}
