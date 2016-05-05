<?php

namespace App\Http\Controllers;
use App\image;
use App\reservation;
use App\User;



use DB;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
/**
 * Created by PhpStorm.
 * User: Nipun's laptop
 * Date: 5/4/2016
 * Time: 12:09 PM
 */


class nController extends Controller
{


    public function getLatest()
    {
        $res=DB::table('images')->orderby('created_at','asc')->Paginate(1);
        return view('/latest')->with('res',$res);
    }

    public function getTrending()
    {
        $trend = DB::table('images')->orderby('Count','asc')->Paginate(1);

        return view('/trending')->with('trend',$trend);
    }

    public function getAllUsers()
    {

        //Store information of all users in $data variable
        $data=User::where('username','!=','admin123456')->get();

        //return the Users with along with the $date variable
        return view('/Users', array('data' => $data));


        #previous attempts
        #$user= DB::table('users')->get();
        #where('name','!=','Admin')
        # echo $user;
        #return view('/Users',array('users'=>$user));


    }


    public function viewSingleUser($id)
    {

        $users=DB::table('users')->where('id',$id)->get();
        return view('viewSingleUser')->with('users',$users);

    }

    public function deleteUser($id)
    {
        $del=DB::table('users')->where('id',$id)->delete();

        # \Session::flash('flash_message','User succesfully deleted');
        return view('/DeletedUser');
    }

    public function index()
    {
        $id=Auth::user()->id;
        if($id==3)
        {
            return view('/adminindex');
        }
        else
        {
            return view('welcome');

        }
    }

    //Function to show purchase history
    public function getImage()
    {
        //Get the user id of the currently logged in user
        $id=Auth::user()->id;

        //Select images reserved by the current user and save them to $image variable
        $image=reservation::where('UserID',$id)->paginate(3);

        //If current user has not made any purchases display appropriate message
        if($image==null)
        {
            echo 'You havenet made any purchases';
        }


        else
        {
            return view('/purchase')->with('image',$image);
        }

    }

    public function searchImage(Request $request)
    {

        //Ensure whether a search key has been entered
        $validator =\Validator::make($request->all(),['SearchKey'=> 'required']);

        if($validator->fails())
        {
            return redirect('/homeF')->withErrors($validator)->withInput();
        }


        //Get the search key entered by the user and store in $key variable
        $key=$request->input('SearchKey');

        //Search database for matching rows
        $result = DB::table('images')->where('file_name', 'LIKE', '%' . $key . '%')->paginate(3);


        return view('/SearchResults')->with('result',$result);

    }

    //Function to view details of selected image
    public function ViewImage($id)
    {

        $imagedetails=image::where('id',$id)->get();


        return view('/ViewImageDetails')->with('imagedetails', $imagedetails);


    }

    public function ViewAllImages()
    {
        $images=image::all();

        return view('/ViewAllImages')->with('images',$images);
    }

    public function viewDetailsOfAnImage($product_id)
    {

        $product_b =DB::table('res')->where('ImageID', $product_id)->first();
        $data = DB::table('imagedetails')->where('id', $product_id)->first();
        return view('painting')->with('data', $data)->with('testproduct', $product_b);
        //\Return View


    }

    public function viewImageAdmin($id)
    {
        $image=DB::table('images')->where('id',$id)->first();

        $image_det=DB::table('imagedetails')->where('id',$id)->first();



        return view('viewSingleImage')->with('image',$image)->with('image_det',$image_det);

    }

    public function deleteImage($id)
    {
        $res=DB::table('images')->where('id', $id)->delete();

        return view('deletedImage')->with('res',$res);
    }

    public function editImage($id)
    {

        $details=DB::table('imagedetails')->where('id',$id)->get();

        $image=DB::table('images')->where('id',$id)->get();

        return view('editImage')->with('details',$details)->with('image',$image);;

    }

    public function edit(Request $request)
    {



        $id=$request->input('id');
        $title=$request->input('title');
        $overview=$request->input('overview');
        $desc=$request->input('desc');
        $addinfo=$request->input('addinfo');
        $cost=$request->input('cost');


    $result=DB::table('imagedetails')->where('id',$id)->update(array('title'=>$title,'quick_overview'=>$overview,'producut_description'=>$desc,'add_info'=>$addinfo,'cost'=>$cost));
     return view('/editedImage')->with('result',$result);

    }



}