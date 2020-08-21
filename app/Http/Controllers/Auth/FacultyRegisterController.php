<?php

namespace App\Http\Controllers\Auth;

use App\Faculty;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Validator;


class FacultyRegisterController extends Controller
{
    public function showFacultyRegisterForm()
    {
        return view('auth.fregister');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */

    protected function createFaculty(Request $request)
    {
        $validator = Validator::make($request->all(),[
        Faculty::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])]);
        return redirect()->intended('/welcome2')->with('success','You have successfully Registered. Please Login');
    }

}
