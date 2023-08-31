<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = 'admin-backend/login';
    protected $guard = "Admin";
    protected $redirectAfterLogout = 'admin-backend/login';
    public function index()
    {
        return view('auth.index');
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        $validation = Auth::guard()->attempt([
            'name' => $request->username,
            'password' => $request->password,
        ]);

        if ($validation) {
            return redirect('admin-backend/index');
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Wrong Credential!'])
                ->withInput();
        }

    }

    public function adminLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('admin-backend/login');
    }
}