<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\finalwishlist;
use Illuminate\Support\Facades\Session;
use DB;

class wishlistController extends Controller
{
	public function addWish($id){
		 /*$data = DB::table('imagedetails')->where('id', $id)->first();

		  $finalwishlist = new  finalwishlist();

		  $finalwishlist->user_id = Session::get('userid');
         $finalwishlist->image_id = $data->id;
        $finalwishlist->image_details =$data->producut_description;
         $finalwishlist->price =$data->cost;
        $finalwishlist->path =$data->image_path;
         $finalwishlist->save();

         return view('painting')->with('finalcart',$finalwishlist)->with('data',$data);*/
	}
    public function showWish(){
    	 $finalwishlist = finalwishlist::all()->where('user_id',Session::get('userid'));
		 return view('wishlist')->with('finalwishlist',$finalwishlist);
    }
    public function removeWish($id){
    	 $finalwishlist = finalwishlist::all()->where('user_id',Session::get('userid'));
    	 finalwishlist::destroy($id);
    	  return view('wishlist')->with('finalwishlist');
    }
}