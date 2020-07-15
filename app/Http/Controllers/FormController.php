<?php

namespace App\Http\Controllers;

use App\FormDetails;
use App\FormFaculty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index(){
        return view('formdetails');
    }

    public function store(Request $request){
        //Validations

        $request->validate([

            'name'  => 'required|string',
            'course'  => 'required|string',
            'facname'  => 'required|max: 50',
            'noheads'   => 'required|integer',
            'facbranch'  => 'required|max: 50',
            'rl'         => 'required|integer',
            'mobileno' => 'required|integer',
            'email' => 'required|string|email|max: 40',
            'passoutyear'=>'required',
            'refno' => 'required|integer',
            'dateofissue'   => 'required|date|after:yesterday',

        ]);

            $id = Auth::User()->id;

//        $users = User::all();

        $formfaculty = new FormFaculty();
        $formfaculty->facname = $request->facname;
        $formfaculty->noheads = $request->noheads;
        $formfaculty->facbranch = $request->facbranch;
        $formfaculty->user_id = $id;
        $formfaculty->save();

        $formdetails = new FormDetails();
        $formdetails->name = $request->name;
        $formdetails->course = $request->course;
        $formdetails->mobileno = $request->mobileno;
        $formdetails->email = $request->email;
        $formdetails->passoutyear = $request->passoutyear;
        $formdetails->dateofissue = $request->dateofissue;
        $formdetails->refno = $request->refno;
        $formdetails->rl = $request->rl;
        $formdetails->user_id = $id;
        $formdetails->save();

        return redirect('/form-filled-successfully');
    }


}
