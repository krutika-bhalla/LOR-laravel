<?php

namespace App\Http\Controllers;

use App\FacImages;
use App\FormDetails;
use App\FormFaculty;
use App\FormImages;
use App\User;
//use Faker\Provider\Image;
//use Faker\Provider\Image;
use Image;
//use League\CommonMark\Inline\Element\Image;
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
        $facimgs = FacImages::all();
        return view('/facultyside')->with('users', $users)->with('formdetails', $formdetails)->with('formfaculty', $formfaculty)->with('facimages', $facimgs);
    }
    //view one form
    public function view($id){
        $users = User::find($id);
        $formdetails = FormDetails::where('user_id', $id)->get();
        $formfaculty = FormFaculty::where('user_id', $id)->get();
        $form_images = FormImages::where('user_id', $id)->get();
        return view('/viewform')->with('users', $users)->with('formdetails', $formdetails)->with('formfaculty', $formfaculty)->with('form_images', $form_images);
    }
    //edit view
    public function uploadImage($id){
        $users = User::find($id);
        $formdetails = FormDetails::where('user_id', $id)->get();
        $formfaculty = FormFaculty::where('user_id', $id)->get();
        $form_images = FormImages::where('user_id', $id)->get();
        return view('/editform')->with('users', $users)->with('formdetails', $formdetails)->with('formfaculty', $formfaculty)->with('form_images', $form_images);
    }
    //store Image
    public function storeImage(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/uploads/facultyside_img'), $imageName);

        //store in db
        $imgs = new FacImages();
        $imgs->image_fac = $imageName;
        $imgs->save();

        return redirect('/facultyside')
            ->with('success','Image Uploaded Successfully')
            ->with('image',$imageName);
    }
}
