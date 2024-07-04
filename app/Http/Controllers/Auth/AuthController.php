<?php

namespace App\Http\Controllers\Auth;

use App\Constant;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostLoginRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // public function getLoginForm()
    // {
    //     return view('test.login');
    // }
    // public function postLoginForm(PostLoginRequest $request)
    // {
    //     // dd($request->all());
    //     // return view('test.login');
    //     $credentials = Auth::guard('admin')->attempt([
    //         'username' => $request->get('username'),
    //         'password' => $request->get('password')
    //     ]);
    //     // dd($credentials);
    //     if ($credentials) {
    //         return redirect('test');
    //     } else {
    //         return redirect()->back();
    //     }
    // }
    // public function getLogoutForm()
    // {
    //     Auth::guard('admin')->logout();
    //     return redirect('login');
    // }


    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function adminLoginForm()
    {
        // $repository = new UserRepository();(not accept OOP)
        // dd($this->userRepository->test());
        if(Auth::guard('admin')->user() != null) {
          return redirect('admin-backend/index');  
        }
        return view('backend.login');
    }
    public function postAdminLogin(AdminLoginRequest $request)
    {
        // dd($request->all());
        // return view('backend.login');

        try {
            $password = $request->get('password');
            $userInfo = $this->userRepository->getUserInfoByUsername((string) $request->get('username'));
            // dd($userInfo);
            if ($userInfo != null) {
                if (!Hash::check($password, $userInfo->password)) {
                    return redirect()
                            ->back()
                            ->withErrors(['login_error' => 'The password you enter does not exit in out database.'])
                            ->withInput();
                } elseif ($userInfo->status != Constant::ADMIN_ENABLE_STATUS) {
                    return redirect()
                    ->back()
                    ->withErrors(['login_error' => 'You have been ban from administrator.'])
                    ->withInput();
                } elseif ($userInfo->deleted_at != null) {
                    return redirect()
                    ->back()
                    ->withErrors(['login_error' => 'You have been deleted from administrator.'])
                    ->withInput();
                } else {
                    $credentials = Auth::guard('admin')->attempt([
                                'username' => $request->get('username'),
                                'password' => $request->get('password')
                    ]);
                    if ($credentials) {
                        $role = (Auth::guard('admin')->user()->role);
                        $route_permission = $this->userRepository->getRolePermissionByRoleId((int) $role);
                        // dd($route_permission);
                        Session::put('permission', $route_permission);
                        return redirect('admin-backend/index');
                    } else {
                        return redirect()
                        ->back()
                        ->withErrors(['login_error' => 'Login fail for unexpected error. Please contact adminstrator.'])
                        ->withInput();
                    }
                }
            } else {
                return redirect()
                ->back()
                ->withErrors(['login_error' => 'The username you enter does not exit in out database.'])
                ->withInput();
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            abort(500);
        }

    }

    public function adminLogout()
    {
        try {
            Auth::guard('admin')->logout();
            Session::flush();
            return redirect('admin-backend/login');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
