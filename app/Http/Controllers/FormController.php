<?php

namespace App\Http\Controllers;

use App\FormDetails;
use App\FormFaculty;
use App\FormImages;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index(){
        return view('formdetails');
    }

    public function store(Request $request){
        //Validations

        $validator = Validator::make($request->all(),[

            'name'  => 'required|string',
            'course'  => 'required|string',
            'rl'         => 'required|integer',
            'mobileno' => 'required|integer',
            'email' => 'required|string|email|max: 40',
            'passoutyear'=>'required',
            'refno' => 'required|integer',
            'dateofissue'   => 'required|date|after:yesterday',

            'facname'  => 'required|string|max: 50',
            'facname.*'  => 'required|string|max: 50',
            'noheads'   => 'required|numeric',
            'noheads.*'   => 'required|numeric',
            'facbranch'  => 'required|string|max: 50',
            'facbranch.*'  => 'required|string|max: 50',
//            'imagelor'  => 'required|max:9999',
//            'imagelor.*'  => 'required|max:9999',
//            'file.*' => 'max:9999',
//            'imagescorecards'  => 'required|mimes:jpg,jpeg,png|max:9999',
//            'imagescorecards.*'  => 'required|mimes:jpg,jpeg,png|max:9999',

        ]);
//
//        $user = Auth::User()->name;
////        dd($id);
////        dd($user);
//        $user_name = $user;
//        $index = 1;
//        $filenames = [];
//        unset($request["_token"]);
//        $files = $request->all();
//        foreach ($files as $item) {
//            $file = $item;
////            dd($file);
//            $extension = $file->getClientOriginalExtension();
//            dd($extension);
//            $file = $item;
//            $img_name = strtolower(str_replace(' ','',$user_name));
//            $filename = $img_name. $index .'.'.time().'.'.$extension; // this will be inserted in db
//            $filenames[] = $filename;
//            $destinationPath = 'uploads';
//            $img = FormImages::make($file->path());
//            $img->resize(300, 300, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save($destinationPath.'/'.$filename);
//
//            $index++;
//        }



        $id = Auth::User()->id;
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

        for($i = 0; $i < count($request->facbranch); $i++) {
            $formfaculty = new FormFaculty();
            $formfaculty->facname = $request->facname[$i];
            $formfaculty->noheads = $request->noheads[$i];
            $formfaculty->facbranch = $request->facbranch[$i];
            $formfaculty->user_id = $id;
            $formfaculty->save();
        }

        return redirect('/form-filled-successfully');
    }


}
