<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
      if(!session()->has('url.intended'))
        {
        session(['url.intended'=>url()->previous()]);
        }
      return view('login');
    }

    public function store(Request $request)
    {

       $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

      /*   */
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
               // 'email' => trans('auth.failed')
                'email' => 'credentials is wrong.. (авторизация не сталась)'
            ]);
            return back()->withInput();
        }
            $request->session()->regenerate();
            return redirect(session()->get('url.intended'));

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
