<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 2/23/2016
 * Time: 11:58 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
//use DB;



use App\users;

use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class map extends  Controller{

    public function view(){

        return view('map/map');
    }





}