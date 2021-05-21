<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:student')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
    }

    public function postLogin(Request $request)
    {
        if ($request->level == 'admin') {
            return $this->adminLogin($request);
        }
        if ($request->level == 'student') {
            return $this->studentLogin($request);
        }
        if ($request->level == 'teacher') {
            return $this->teacherLogin($request);
        }
    }

    public function viewLogin()
    {
        return view('auth.login.index');
    }

    // ADMIN
    public function adminLogin($request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // dd(auth()->guard('admin')->check());
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    // SISWA
    public function studentLogin($request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('student')->attempt(['nis' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // dd(auth()->guard('siswa')->check());
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    // GURU
    public function teacherLogin($request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('teacher')->attempt(['nip' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // dd(auth()->guard('siswa')->check());
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('username', 'remember'));
    }
}
