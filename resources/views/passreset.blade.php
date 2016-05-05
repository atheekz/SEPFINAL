@extends('master')
<?php /*<script src={{ asset('ajax/register.js') }} type="text/javascript"></script>*/
?>
        <!--
	<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Your Website Title" />
	<meta property="og:description"   content="Your description" />
	<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />


-->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--facebook-->
<script>
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.


        }
    }
    window.fbAsyncInit = function() {
        FB.init({
            /*            appId      : '1192320307463956',
             cookie     : true,  // enable cookies to allow the server to access
             // the session
             xfbml      : true,  // parse social plugins on this page
             version    : 'v2.2' // use version 2.2
             */

            appId      : '1716124405299360',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.5'
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function login(){
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    window.location="../app/login_ajax/"+response.name+"/"+response.id+"";
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
    }


</script>
<!-- facebook -->
<script>
    jQuery( document ).ready(function( $ ) {

        $(function() {
            $( "#dialogmessage" ).dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });

    });
</script>
@section('content')
        <!--fb like :share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=750548591758451";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--fb like :share -->

<div class="banner-top">



    <!-- new-->

    @if(session('message')=='Success')


        <div id="dialogmessage" title="Thank you">
            <p>
                <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                your
            </p>
            <p>
                <b>email</b> has been successfully sent.
            </p>
        </div>
    @endif

    @if(session('message')=='error')


        <div id="dialogmessage" title=" Error">
            <p>
                <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                sorry we couldn't send an
            </p>
            <p>
                <b>email</b> to our server try again later or contact customer service.
            </p>
        </div>
        @endif
                <!-- new-->


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body">
                        </div>
                        <form  role="form" method="POST" action="{{ url('ressetmail') }}">

                            {!! csrf_field() !!}




                            <div class="login-mail">
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">



                                    <i style="float:left;position: relative;" class="glyphicon glyphicon-envelope"></i>
                                    <input id="email" type="email" size="100" placeholder="Email" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div id="final_submit">
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>

                        </form>




                    </div>



                    <!--facebook -->
                    <!--facebook-->
                </div>
            </div>
            <!--like -->
            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="10" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
            <!--shre-->
@stop
