<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\UserStoreRequest;
use App\ReturnMessage;
use App\Utility;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
        DB::connection()->enableQuerylog();
    }
    public function index() {
        try{
            $users = $this->userRepository->getUsers();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::index - \n", $queryLog);
            return view('backend.user.index', compact([
                'users'
            ]));
        }catch(\Exception $e) {
            
            Utility::saveErrorLog("UserController::index - \n", $e->getMessage());
            abort(500);
        }      
    }

    public function create() {
        try{
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::create - \n", $queryLog);
            return view('backend.user.form');
        }catch(\Exception $e) {
            Utility::saveErrorLog("UserController::create - \n", $e->getMessage());
            abort(500);
        }
    }
    public function store(UserStoreRequest $request) {
        try{
            $result = $this->userRepository->store((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::store - \n", $queryLog);
            if($result['status'] == ReturnMessage::OK){
                return redirect('admin-backend/user/index')->with('success_msg','User create success.');
            } else{
                return redirect('admin-backend/user/index')->with('error_msg', 'User create fail.');
            }
        }catch(\Exception $e) {
            Utility::saveErrorLog("UserController::store - \n", $e->getMessage());
            abort(500);
        }
    }

    public function editPassword(int $id) {
        try{
            $users = $this->userRepository->getUserById((int) $id);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("UserController::editPassword - \n", $queryLog);
            if($users == null){
                abort(404);
            }
            return view('backend.user.edit_password', compact(['id']));
        }catch(\Exception $e) {
            if($e->getCode() == 0){
                abort(404);
            }
            Utility::saveErrorLog("UserController::editPassword - \n", $e->getMessage());
            abort(500);
        }
    }

}
