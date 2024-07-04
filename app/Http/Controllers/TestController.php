<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        $cities = Cities::SELECT("id", "name")
                    ->orderBy('id', 'ASC')
                    ->whereNull('deleted_at')
                    ->get();
        $members = Members::SELECT("id", "username", "city_id")
                    ->get();
        // return "Index page.";
        return view('test.index', compact([
            'cities',
            'members',
        ]));
    }
    public function postFormStore(CityStoreRequest $request)
    {
        // dd($request->all());
        $city = $request->get('city');
        // $paramObj = new Cities();
        // $paramObj->name = $city;
        // $paramObj->created_by = 1;
        // $paramObj->updated_by = 1;
        // $paramObj->created_at = date('Y-m-d H:i:s');
        // $paramObj->updated_at = date('Y-m-d H:i:s');
        // $paramObj->save();
        $insert = [];
        $insert['name'] = $city;
        $insert['created_by'] = 1;
        $insert['updated_by'] = 1;
        Cities::create($insert);

        return redirect('test');
    }

    public function edit($id)
    {
        $cities = Cities::SELECT("id", "name")
                    ->orderBy('id', 'ASC')
                    ->get();
        $edit_city = Cities::find($id);
        return view('test.index', compact([
            'cities',
            'edit_city'
        ]));
    }

    public function postFormUpdate(CityUpdateRequest $request)
    {
        // dd($request->all());
        $city_name = $request->get('city');
        $id = $request->get('id');
        $update = Cities::find($id);
        $update->name = $city_name;
        $update->updated_at = date('Y-m-d H:i:s');
        $update->updated_by = 1;
        $update->save();
        return redirect('test');
    }

    public function delete($id)
    {
        $delete_data = [];
        $delete = Cities::find($id);
        // $delete->delete();
        $delete_data['deleted_at'] = date('Y-m-d H:i:s');
        $delete_data['deleted_by'] = 1;
        $delete->update($delete_data);
        return redirect('test');
    }

}
