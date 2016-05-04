<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'alpha_dash|required|min:6|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phoneNo' => 'numeric|digits_between:10,15|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    protected function Create(array $data){

        $confirmation_code = str_random(30);
      /*  $User = new User;
        $User->username = $data['username'];
        $User->email = $data['email'];
        $User->phoneNo = $data['phoneNo'];
        $User->password = bcrypt($data['password']);
        $User->confirmation_code = $confirmation_code;

        $User->save();*/

       // return redirect('/')->with('message', 'Thanks for signing up! Please check your email.');



        User::create([
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'phoneNo' => Input::get('phoneNo'),
            'password' => bcrypt(Input::get('password')),
            'confirmation_code' => $confirmation_code
        ]);

    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)
    {
       // $confirmation_code = str_random(30);
//new
  /*    $User = new User;
      $User->username = $data['username'];
      $User->email = $data['email'];
      $User->phoneNo = $data['phoneNo'];
      $User->password = bcrypt($data['password']);
      $User->confirmation_code = $confirmation_code;

      $User->save();

        return redirect('/')->with('message', 'Thanks for signing up! Please check your email.');*/
//new
       // return redirect('/')->with('status', 'Thanks for signing up! Please check your email.');

        /* Mail::send('email.verify', $confirmation_code, function($message) {
             $message->to(Input::get('email'), Input::get('username'))
                 ->subject('Verify your email address');
         });

         Flash::message("Thanks for signing up! Please check your email.");

         return Redirect::home();*/
      //$confirmation_code = str_random(30);
       // Flash::message("Thanks for signing up! Please check your email.");

       /* return User::create([



      ]);

        /*COOREDCT

              'name' => $data['name'],
           'email' => $data['email'],
           'password' => bcrypt($data['password'])




           'username' => $data['username'],

          'email' => $data['email'],
          'phoneNo'=> $data['phoneNo'],
          'password' => bcrypt($data['password']),
          'confirmation_code' => $confirmation_code*/

    //}
}
