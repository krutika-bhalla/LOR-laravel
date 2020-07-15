<?php

namespace App\Http\Controllers;

use App\FormDetails;
use App\FormFaculty;
use App\User;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:faculty');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/facultyside');
    }
    //view forms of all students
    public function viewAllForms(){
        $users = User::all();
        $formdetails = FormDetails::all();
        $formfaculty = FormFaculty::all();
        return view('/facultyside')->with('users', $users)->with('formdetails', $formdetails)->with('formfaculty', $formfaculty);
    }
    //view one form
    public function view($id){
        $users = User::find($id);
        $formdetails = FormDetails::where('user_id', $id)->get();
        $formfaculty = FormFaculty::where('user_id', $id)->get();
        return view('/viewform')->with('users', $users)->with('formdetails', $formdetails)->with('formfaculty', $formfaculty);
    }
}
