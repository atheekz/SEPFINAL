<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 3/12/2016
 * Time: 2:20 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
//use DB;
require('textlocal.php');


use App\users;

use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class product extends Controller
{
    //\View product details
    public function show($product_id)
    {

        $product_b =DB::table('res')->where('ImageID', $product_id)->first();
        $data = DB::table('imagedetails')->where('id', $product_id)->first();
        return view('painting')->with('data', $data)->with('testproduct', $product_b);
        //\Return View


    }



    //\Rating
public function rating($val,$id){

    $data = DB::table('imagedetails')->where('id', $id)->first();
    $r=$data->rating;
    $finalrate=($r+$val)/2;//calculate raiting
   // $data->rating= floor($finalrate);//calculate floor value
    $result=floor($finalrate);
    DB::table('imagedetails')
        ->where('id', $id)
        ->update(['rating' => $result]);
    return  Redirect::back()->with('data', $data)->with('finalrate', $finalrate);

}

}