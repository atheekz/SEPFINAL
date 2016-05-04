<?php

namespace App\Http\Controllers;
/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;*/
namespace App\Http\Controllers;

use DB;
use App\Quotation;

class register_controller extends Controller
{
   public function edit(){
      $result=DB::table('users')->get();

       return view('register.index')->with('data', $result);
   }
    public function register(){
        $result=DB::table('users')->get();

        return view('register.index')->with('data', $result);
    }
}
