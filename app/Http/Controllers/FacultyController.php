<?php

namespace App\Http\Controllers;

use App\FormDetails;
use App\FormFaculty;
use App\FormImages;
use App\User;
//use Faker\Provider\Image;
use Intervention\Image\Facades\Image;
use Validator;
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
    //edit view
    public function uploadImage($id){
        $users = User::find($id);
        $formdetails = FormDetails::where('user_id', $id)->get();
        $formfaculty = FormFaculty::where('user_id', $id)->get();
        return view('/editform')->with('users', $users)->with('formdetails', $formdetails)->with('formfaculty', $formfaculty);
    }
    //store Image
    public function storeImage(Request $request){
        $validate = Validator::make($request->all(),[
            'image' => 'required|mimes:jpg,jpeg,png|max:9999',
        ]);
        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $file = $request->file('image');
        $destinationPath = 'uploads/facultyside_img';
        $img_name = strtolower(str_replace(' ','',$request->name));
        $filename = $img_name.'.'.time().'.'.$extension; // this will be inserted in db
        // resizing to optimize loading time.
        $img = Image::make($file->getRealPath());
        $img->resize(1000, 1000, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$filename);

        //db
        $imgs = new FormImages();
        $imgs->image_fac = $filename;
        $imgs->save();
        return redirect('/facultyside');
    }
}
