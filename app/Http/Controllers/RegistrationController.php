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
use App\subscription;

//use DB;
require('textlocal.php');


use App\users;

use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Mockery\CountValidator\Exception;

class RegistrationController extends  Controller{

    public function view(){
if(!$_SESSION['facebook']){
        return view('auth/register');
    }
    }
    /**
     *
     * @return mixed
     *
     */

 //validate an d register a new user
public function finalregister()
{
                                                         //rules used by the validator
    $rules = [
        'username' => 'alpha_dash|required|min:6|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'phoneNo' => 'numeric|digits_between:10,15|unique:users',
        'password' => 'required|confirmed|min:6',
        'val_option' => 'required',
    ];
    $input = Input::only(
        'username',
        'email',
        'phoneNo',
        'password',
        'password_confirmation',
        'val_option'
    );

    $validator = Validator::make($input, $rules);
                                                                        //return errors
    if ($validator->fails()) {
        return Redirect::back()->withInput()->withErrors($validator);
    }                                                                   //register user
    $confirmation_code = str_random(6);

    $User = new Users;
    $User->username = $input['username'];
    $User->email = $input['email'];
    $User->phoneNo = $input['phoneNo'];
    $User->password = $input['password'];
    $User->confirmation_code = $confirmation_code;

    $User->save();
                                                            //mail
if($input['val_option']=='email') {
    /* $username = $input['username'];
      $email = $input['email'];
     $phoneNo = $input['phoneNo'];*/

    /*  Mail::send('email.verify', $confirmation_code, function($message) {
          $message->to(Input::get('email'), Input::get('username'))
              ->subject('Verify your email address');
      });*/

    if (Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function ($message) use ($input) {
        $message->to($input['email'], $input['username'])->subject('Welcome To Paint Pal!');
    })
    ) {
        //Flash::message('Thanks for signing up! Please check your email.');
        //::message('Thanks for signing up! Please check your email.');
        /*  Flash :: Session ("key",
                "('Thanks for signing up! Please check your email.");
        */
        //$input->session()->flash('alert-success', 'User was successful added!');
                                                        //redirect with sucess
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

    if($input['val_option']=='sms'){
                                                ///SMS



                  /*  $info = "1";
                    $test = "0";

                    $uname = 'seppaintpal@gmail.com';
                    $pword = 'Shaiba91';
                    $from = "Paint Pal";
                    $selectednums = $input['phoneNo'];
                    $mess = "WELCOME TO PAINT PAL!,THANKS FOR CREATING AN ACCOUNT WITH PAINT PAL.Verification Code :".$confirmation_code;
                    $message=$mess;
                    $message = urlencode($message);

                    $data = "uname=".$uname."&pword=".$pword."&message=".$message
                        ."&from=". $from."&selectednums=".$selectednums."&info=".$info."&test=".$test;

                    $ch = curl_init('https://www.txtlocal.com/sendsmspost.php'); //note https for SSL
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch); //This is the result from Textlocal
                    curl_close($ch);*/
        $textlocal = new Textlocal('seppaintpal@gmail.com', 'Shaiba91');

        $numbers = array($input['phoneNo']);
        $sender = 'Paint_Pal';
        $message = 'WELCOME TO PAINT PAL!,THANKS FOR CREATING AN ACCOUNT WITH PAINT PAL.Verification Code :'.$confirmation_code;


        if( $result = $textlocal->sendSms($numbers, $message, $sender)){


            print_r($result);

            return Redirect::back()
                ->with('message', 'Success')
                // ->withInput()
                ->withErrors($validator);
        }
        else {
            // die('Error: ' . $e->getMessage());

            return Redirect::back()
                ->with('message', 'error')
                // ->withInput()
                ->withErrors($validator);

        }

    }
}


    public function store()
    {
        $rules = [
            'username' => 'alpha_dash|required|min:6|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phoneNo' => 'numeric|digits_between:10,15|unique:users',
            'password' => 'required|confirmed|min:6',
            'val_option' => 'required',
        ];

        $input = Input::only(
            'username',
            'email',
            'phoneNo',
            'password',
            'password_confirmation',
            'val_option'
        );

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);

        $User = new User;
        $User->username = $input['username'];
        $User->email = $input['email'];
        $User->phoneNo = $input['phoneNo'];
        $User->password = $input['password'];
        $User->confirmation_code = $confirmation_code;

        $User->save();
      /*  User::create([
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'phoneNo' => Input::get('phoneNo'),
            'password' => Hash::make(Input::get('password')),
            'confirmation_code' => $confirmation_code
        ]);*/


     /*   Mail::send('email.verify', $confirmation_code, function($message) {
            $message->to(Input::get('email'), Input::get('username'))
                ->subject('Verify your email address');
        });
*/
        Flash::message('Thanks for signing up! Please check your email.');

        return Redirect::home();
    }

                                                            //confirmation code
    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = users::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Flash::message('You have successfully verified your account.');
        return redirect('/');
       // return Redirect::route('login_path');
    }




    public function facebook_login($username,$id){
                                                                                    //facebook_login
                                                                                    //save Session
        /*$input = Input::only(
            'username',
            'id'
        );*/
        //$request->session()->put('username', 'value');
        Session::set('facebook', 'true');
        $i='http://graph.facebook.com/'.$id.'/picture?type=square';
        Session::set('image', $i);
        Session::set('username', $username);
        Session::set('id', $id);

        //return redirect('/');
        return Redirect::back();
    }

    public function google_login($username,$id,$imageurl){
        //facebook_login
        //save Session
        /*$input = Input::only(
            'username',
            'id'
        );*/
        //$request->session()->put('username', 'value');
        Session::set('google', 'true');
        $i=$imageurl;
        Session::set('image', $i);
        Session::set('username', $username);
        Session::set('id', $id);

        //return redirect('/');
        return Redirect::back();
    }

    public function signout(){
        session()->forget('google');
        session()->forget('facebook');
        session()->forget('image');
        session()->forget('username');
        session()->forget('id');
        session()->forget('userid');

      //  return Redirect::back();

return Redirect::to('/');



    }

    public function viewlogin(){
                                                        //login
         return view('auth/login');

    }
    public function auth_loginv(){

        $rules = [
            'username' => 'required|alpha_dash|min:6|exists:users',
            'password' => 'required|min:6',

        ];

        $input = Input::only(
            'username',
            'password'
        );

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        /*$credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];

        if ( ! Auth::attempt($credentials))
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'credentials' => 'We were unable to sign you in.'
                ]);
        */
        $tcheck=false;
$i = users::all();
        foreach($i as $item){
         if($item->username==$input['username'] && $item->password==$input['password']) {
             $tcheck=true;
             if($item->username=='admin123456' && $item->password=='admin123456'){
                 Session::set('facebook', 'true');
                 $i='http://www.propertyzaar.com/images/default-user.png';
                 Session::set('image', $i);
                 Session::set('username', $input['username']);
                 Session::set('userid', $item->id);
                 return view('adminmain');
             }
         }


        }
       /* $testq= users::where('username',$input['username'])
            ->where('password', '=', $input['password'])
            ->where('confirmed', '=', '1')
            ->get();
*/


        if($tcheck){
            Session::set('facebook', 'true');
            $i='http://www.propertyzaar.com/images/default-user.png';
            Session::set('image', $i);
            Session::set('username', $input['username']);
            Session::set('userid', $item->id);

          //  Session::set('id', $testq['id']);
          //  return view('');
          //  return Redirect::to('homeF');
            return view('homeF');

        }
        else{
            return Redirect::back()
                ->with('message', 'error')
                // ->withInput()
                ->withErrors($validator);
        }

       // return view('painting');

    }

    public function loadhome(){
        return view('homeF');
    }

    public function redirect(){

        if(Session::get('username')=='admin123456'){
            return view('adminmain');
        }
        else{
            return view('homeF');
        }

    }

    public function edituser_view($usename){
        $user = DB::table('users')->where('username', $usename)->first();
        return view('editview')->with('user', $user);


    }

    /**
     * @param Request $request
     * @return $this
     */
    public function update(Request $request){                       //update
        $rules = [
            'id' => 'required',
            'username' => 'alpha_dash|required|min:6',
            'email' => 'required|email|max:255',
            'phoneNo' => 'numeric|digits_between:10,15',

        ];
        $input = Input::only(
            'id',
            'username',
            'email',
            'phoneNo'

        );

        $validator = Validator::make($input, $rules);

      /*  if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }iid
*/
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
           /* $i1d = DB::table('users')
                ->where('id', $request->input('email'))
                ->update(array('email' => $request->input('email')));
            $id2 = DB::table('users')
                ->where('id',$request->input('email'))
                ->update(array('phoneNo' => $request->input('phoneNo')));
*/

        $category = users::findOrFail($request->input('id'));

        $category->email = $request->input('email');
        $category->phoneNo = $request->input('phoneNo');
        $category->save();




        $user = DB::table('users')->where('username', $request->input('username'))->first();
        return view('editview')->with('user', $user);


    }




    public function addsub(Request $request){                       //update
        $rules = [

            'email' => 'required|email|max:255|unique:subscription',

        ];
        $input = Input::only(
            'email'

        );

        $validator = Validator::make($input, $rules);

        /*  if ($validator->fails()) {
              return Redirect::back()->withInput()->withErrors($validator);
          }
  */



        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
       if( DB::insert('insert into subscription (email) values (?)', [$request->input('email')])){

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


    public function search_email(Request $request){
        $results = DB::select("select * from subscription where ? LIKE '%?%'", array('email', $request->input('email')));

        foreach($results as $run)
        {

            $id=$run->name;
            $email=$run->name;

           echo "<a href='result.php?id=".$id."'>".$email."</a><br/>";
         //return Redirect::back()
           //     ->with('email',  $email);
                // ->withInput()

        }


    }

    public function AdminSubscription(){
       // $email = DB::table('subscription')->where('id', '>', 0)->get();
$email = subscription::all();
        return view('amdin_subscribe')->with('email', $email);
    }



public function sendsubscription(){
    $rules = [
        'title' => 'alpha_dash|required|min:6|max:55',
        'heading' => 'alpha_dash|required|max:55',
        'body' => 'min:6|max:255',
        'url' => 'required|url|min:6',

    ];
    $input = Input::only(
        'title',
        'heading',
        'body',
        'url'
    );

    $validator = Validator::make($input, $rules);
    //return errors
    if ($validator->fails()) {
        return Redirect::back()->withInput()->withErrors($validator);
    }                                                                   //register user
   /* $confirmation_code = str_random(6);

    $User = new Users;
    $User->username = $input['username'];
    $User->email = $input['email'];
    $User->phoneNo = $input['phoneNo'];
    $User->password = bcrypt($input['password']);
    $User->confirmation_code = $confirmation_code;

    $User->save();
    //mail

        /* $username = $input['username'];
          $email = $input['email'];
         $phoneNo = $input['phoneNo'];*/

        /*  Mail::send('email.verify', $confirmation_code, function($message) {
              $message->to(Input::get('email'), Input::get('username'))
                  ->subject('Verify your email address');
          });*/




        if (Mail::send('email.subscribe',  ['input' => $input], function ($message) use ($input) {
            $message->to('atheekzareen91@gamil.com', $input['title'])->subject('Contact');
        })
        ) {
            //Flash::message('Thanks for signing up! Please check your email.');
            //::message('Thanks for signing up! Please check your email.');
            /*  Flash :: Session ("key",
                    "('Thanks for signing up! Please check your email.");
            */
            //$input->session()->flash('alert-success', 'User was successful added!');
            //redirect with sucess
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
public function resetpass(){

    return view('passreset');
}


    public function ressetmail(){
        $rules = [

            'email' => 'required|email|max:255',
        ];
        $input = Input::only(

            'email'

        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }





        if (Mail::send('email.reset', ['input' => $input], function ($message) use ($input) {
            $message->to($input['email'])->subject('Password Reset');
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
    public function finalreset(){

        return view('freset');
    }

    public function resetsubmit(Request $request){
        $rules = [

            'email' => 'required|email|max:255',

            'password' => 'required|confirmed|min:6',

        ];
        $input = Input::only(

            'email',

            'password',
            'password_confirmation'

        );

        $validator = Validator::make($input, $rules);
        //return errors
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        //register user
        $userl = users::all();
            foreach($userl as $user){
                if($user->email == $request->input('email')){
                    $category = users::findOrFail($user->id);


                    $category->password	 = $request->input('password');
                    $category->save();
                }
            }


        //mail

            /* $username = $input['username'];
              $email = $input['email'];
             $phoneNo = $input['phoneNo'];*/

            /*  Mail::send('email.verify', $confirmation_code, function($message) {
                  $message->to(Input::get('email'), Input::get('username'))
                      ->subject('Verify your email address');
              });*/

                //Flash::message('Thanks for signing up! Please check your email.');
                //::message('Thanks for signing up! Please check your email.');
                /*  Flash :: Session ("key",
                        "('Thanks for signing up! Please check your email.");
                */
                //$input->session()->flash('alert-success', 'User was successful added!');
                //redirect with sucess
                return Redirect::back()
                    ->with('message', 'Success')
                    // ->withInput()
                    ->withErrors($validator);

    }

    public function checkout(){

        return view ('checkout');
    }
}
