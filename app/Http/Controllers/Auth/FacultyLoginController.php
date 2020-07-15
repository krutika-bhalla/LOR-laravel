<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:faculty');
    }

    public function showFacultyLoginForm()
    {
        return view('auth.flogin');
    }

    public function facultyLogin(Request $request)
    {
        //Validate form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        //attempt to log the user in --> if logged in then redirect
        if (Auth::guard('faculty')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/facultyside');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


}
