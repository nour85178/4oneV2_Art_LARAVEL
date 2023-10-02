<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {

        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role === 'client') {
            return redirect('/front');
        }

        return redirect($this->redirectTo);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function username()
    {
        return 'email';
    }
}
