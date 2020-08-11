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
use Intervention\Image\Facades\Image;


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
//            'imagelor1' => 'required|mimes:jpg,jpeg,png|max:9999',
//            'imagelor2' => 'required|mimes:jpg,jpeg,png|max:9999',
//            'imagelor3' => 'required|mimes:jpg,jpeg,png|max:9999',
//            'imagelor' => 'array| max:3',
//            'imagelor.*'  => 'required|max:9999',

//            'file.*' => 'max:9999',
//            ,
//            'imagescorecards.*'  => 'required|mimes:jpg,jpeg,png|max:9999',

        ]);

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

        //for Images (Uncommit and resolve)
//        $name = Auth::User()->name;
//        $index = 1;
//        $filenames = [];
//        unset($request["_token"]);
//        $files = Arr::flatten($request->all()); // laravel helper to flatten array :3
//
//        foreach ($files as $item) {
//            $file = $item;
//            $extension = $file->getClientOriginalExtension();
//            $file = $item;
//            $img_name = strtolower(str_replace(' ','',$name));
//            $filename = $img_name. $index .'.'.time().'.'.$extension; // this will be inserted in db
//            $filenames[] = $filename;
//            $destinationPath = 'images/uploads/';
//            $img = Image::make($file->path());
//            $img->resize(300, 300, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save($destinationPath.'/'.$filename);
//
//            // save to db
//            $model = new FormImages();
//            $model->id = $id;
//            $model->imagelor = $filename;
//            $model->save();
//
//            $index++;
//        }


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
