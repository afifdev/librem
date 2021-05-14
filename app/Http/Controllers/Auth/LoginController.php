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
        $this->middleware('guest:siswa')->except('logout');
        $this->middleware('guest:guru')->except('logout');
    }

    public function selectRoles(Request $request)
    {
        if ($request->roles == 'admin') {
            return $this->adminLogin($request);
        }
        if ($request->roles == 'siswa') {
            return $this->siswaLogin($request);
        }
        if ($request->roles == 'guru') {
            return $this->guruLogin($request);
        }
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
    public function siswaLogin($request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('siswa')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // dd(auth()->guard('siswa')->check());
            return redirect()->intended('/siswa');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    // GURU
    public function guruLogin($request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('guru')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // dd(auth()->guard('siswa')->check());
            return redirect()->intended('/guru');
        }
        return back()->withInput($request->only('username', 'remember'));
    }
}
