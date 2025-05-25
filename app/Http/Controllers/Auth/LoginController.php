<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->role === 'admin') {
    //         return redirect()->intended('/admin/dashboard');
    //     }

    //     if ($user->role === 'bengkel') {
    //         return redirect()->intended('/bengkel/dashboard');
    //     }

    //     Auth::logout();
    //     return redirect('/login')->withErrors(['role' => 'Role tidak dikenali']);
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showBengkelLoginForm()
    {
        return view('auth.bengkel_login');
    }

    // public function bengkelLogin(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt(array_merge($credentials, ['role' => 'bengkel']))) {
    //         return redirect()->intended('/bengkel/dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email atau password salah, atau Anda bukan user bengkel.',
    //     ]);
    // }
}
