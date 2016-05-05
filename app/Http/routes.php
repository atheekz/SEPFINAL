<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/edit','register_controller@edit');
//Route::get('/register','register_controller@register');

//new
/* verify
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);*/




//function(){
   // return view('register');
//});
/*
Route::get('/home2',function(){
   return view('home');
});*/
/*
Route::get('home', function () {
   //return Redirect::to('auth/login');
   if (Auth::guest()){
   	return Redirect::to('auth/login');
   }
   else{
   echo "welcome Home".Auth::user()->email();
   }
});*/

Route::get('users', function () {
   $users=App\users::find(1);
   echo "Hellow ".$users->Username;
}); 





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//MIDDLEWARE
Route::group(['middleware' => ['web']], function () {
	
   // Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
 /*   Route::get('auth/register', 'RegistrationController@store');
    Route::post('auth/register', 'RegistrationController@store');
*/
    Route::get('auth/register', 'RegistrationController@view');
    Route::post('auth/register', 'RegistrationController@store');



     Route::post('auth/finalregister', 'RegistrationController@finalregister');///Final register usinf forms


    Route::post('app/login_ajax', 'RegistrationController@facebook_login');//facebook login using Ajax Query which is used to session variables
    Route::get('app/login_ajax/{username}/{id}', 'RegistrationController@facebook_login');

    Route::get('app/googlelogin_ajax/{username}/{id}/{imageurl}', 'RegistrationController@google_login');//gogle login
    Route::get('/adminsubscribe', 'RegistrationController@AdminSubscription');//admin Subscription
    Route::post('/addsub', 'RegistrationController@addsub');//contact is mail
    Route::get('searche', 'RegistrationController@search_email');
    ////get login    resetsubmit
    Route::post('/ressetmail', 'RegistrationController@ressetmail');
    Route::post('/resetsubmit', 'RegistrationController@resetsubmit');
    Route::get('/freset', 'RegistrationController@finalreset');
    Route::get('/resetpass', 'RegistrationController@resetpass');
    Route::post('/sendsub', 'RegistrationController@sendsubscription');//send subscription
    Route::get('/sign_out', 'RegistrationController@signout');//sign out
    Route::get('/contact', 'Contact@view');//Contact us view
    Route::post('/contactus', 'Contact@mail');//contact is mail
    Route::get('/painting/{id}','product@show');//show data via db
    Route::get('/login', 'RegistrationController@viewlogin');//login
    Route::post('/loginv', 'RegistrationController@auth_loginv');//post login
    Route::get('/homeF','RegistrationController@loadhome');//main home page
    Route::get('/edituser/{username}','RegistrationController@edituser_view');//edit user details
//    Route::post('/edituser/{username}','RegistrationController@update');
//    Route::get('/edituser','RegistrationController@edituser_view');
    Route::post('/editview2','RegistrationController@update');
    Route::get('app/rating_ajax/{val}/{id}', 'product@rating');//raing controller using ajax
    Route::get('/map', 'map@view');
    Route::get('/', function () {
        return view('homeF');
    });
    Route::get('/checkout', function () {
        return view('checkout');
    });
//confirmation using the verification code
    Route::get('register/verify/{confirmationCode}', [
        'as' => 'confirmation_path',
        'uses' => 'RegistrationController@confirm'
    ]);

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');







    //NIPUN
    Route::get('latest','nController@getLatest');

    Route::get('trending','nController@getTrending');

    Route::get('/list','nController@getAllUsers');

    Route::get('user/view/{id}','nController@viewSingleUser');

    Route::get('deleteuser/{id}','nController@deleteUser');

    Route::post('search','nController@searchImage');

    Route::get('viewimage/{id}','nController@viewDetailsOfAnImage');

    Route::get('viewimages','nController@ViewAllImages');

    Route::get('viewSingleImageAdmin/{id}','nController@viewImageAdmin');

    Route::get('deleteImage/{id}','nController@deleteImage');
    //END-NIPUN
});

/* ------------ Chandeesha ------------ */



Route::group(['middleware' => ['web']], function () {

    //Load Categories for users to view
    Route::get('categories', 'PageController@catload');

    //Load Specific Category for Users
    Route::get('category/view-cat/{id}', 'PageController@viewcat2');

    //View and add categories (admin)
    Route::get('addcat/list', 'PageController@catlist');

    //View specific category for admin
    Route::get('category/view/{id}', 'PageController@viewcat');

    //Update category
    Route::post('category/update/{id}', 'PageController@updatecat');

    //Make Custom Request
    Route::get('custom_cat', 'PageController@customcatload');

    //test
    Route::post('testsave', 'PageController@testSave');

    //user's Custom Requests
    Route::get('customlist', 'PageController@customlist');

    Route::get('a_customlist', 'PageController@a_customlist');

    Route::post('category/save', 'PageController@savecat');

    Route::post('category/do-upload', 'PageController@doImageUpload');

    Route::post('custom/do-upload', 'PageController@doCustomUpload');

    Route::get('category/delete/{id}', 'PageController@deletecat');

    Route::get('image/delete/{id}', 'PageController@deleteimage');

    Route::get('customlist/view/{id}', 'PageController@viewreq');
    Route::get('a_customlist/view/{id}', 'PageController@a_viewreq');



});

