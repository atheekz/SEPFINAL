<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 3/12/2016
 * Time: 9:00 AM
 */

namespace app\Http\Controllers;


use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\users;

use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class Contact extends Controller
{
public function view(){

    return view('contactus');

}
    public function mail(){
        $rules = [
            'name' => 'alpha_dash|required|min:6',
            'email' => 'required|email|max:255',
            'phoneNo' => 'numeric|digits_between:10,15',
            'subject' => 'required|min:10',
        ];
        $input = Input::only(
            'name',
            'email',
            'phoneNo',

            'subject'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }





            if (Mail::send('email.contact', ['input' => $input], function ($message) use ($input) {
                $message->to('seppaintpal@gmail.com', $input['name'])->subject('Contact');
            })
            ) {
                //Flash::message('Thanks for signing up! Please check your email.');
                //::message('Thanks for signing up! Please check your email.');
                /*  Flash :: Session ("key",
                        "('Thanks for signing up! Please check your email.");
                */
                //$input->session()->flash('alert-success', 'User was successful added!');

                return Redirect::back()
                    ->with('message', 'Success')
                    // ->withInput()
                    ->withErrors($validator);
            } else {

                return Redirect::back()
                    ->with('message', 'error')
                    // ->withInput()
                    ->withErrors($validator);

            }
        }



}