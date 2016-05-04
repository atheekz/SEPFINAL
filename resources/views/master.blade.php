<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 2/22/2016
 * Time: 7:13 PM
 */
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Paint Pal</title>
<link href={{ asset('css/bootstrap.css') }} rel="stylesheet" type="text/css" media="all" />
	<meta name="google-signin-client_id" content="1045555298252-8p3tpqmef7q6qe2ekq3pf1a0kdu3u0j7.apps.googleusercontent.com">
	<!--google-sign-in-->
	<link href={{ asset('css/infowindow.css') }} rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files"css/bootstrap.css" -->
<!--theme-style-->
<link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css" media="all" />
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--//theme-stylecss/style.css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->
<link href={{ asset('css/style4.css') }} rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href={{ asset('css/rating.css') }} type="text/css" media="all" />

	<!--//theme-style"./css/style4.css"-->
<script src=></script>

	<script type="text/javascript" src={{asset('geometa.js')}}></script>
	<!--new-->
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src={{ asset('csi.js-include_html/csi.min.js') }}></script>
	<script src="https://code.createjs.com/easeljs-0.8.2.min.js"></script>
	<script src="jscolor.js"></script>
	<!--new-->


	<!--- start-rate"---->
	<script src={{ asset('js/jstarbox.js') }}></script>
	<link rel="stylesheet" href={{ asset('css/jstarbox.css') }} type="text/css" media="screen" charset="utf-8" />
	<script type="text/javascript">
		jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
				starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
				}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
						var val = Math.random();
						starbox.next().text(' '+val);
						Console.write(val);
						return val;

					}
				})
			});
		});
	</script>
	<!---//End-rate---->
	<!---//new----->

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

						window.location="./app/login_ajax/"+response.name+"/"+response.id+"";
					});
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			});
		}


	</script>
	<!-- facebook -->

	<!--google -->
	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

	<script>
		function onSignIn(googleUser) {
			var profile = googleUser.getBasicProfile();
			console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
			console.log('Name: ' + profile.getName());
			console.log('Image URL: ' + profile.getImageUrl());
			console.log('Email: ' + profile.getEmail());
			window.location="./app/googlelogin_ajax/"+profile.getName()+"/"+profile.getId()+"/"+ "dfsfs";

		}


		function signOut2() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				console.log('User signed out.');
				window.location="./sign_out";
			});
		}
		function onLoad() {
			gapi.load('auth2', function() {
				gapi.auth2.init();
			});
		}

	</script>


	<!--google-->

</head>
<body onload="initialise()" >

@if(session('message'))
{{session('message')}}
@endif

<!--header-->
<div class="header">
<div class="container">
		<div class="head">
			<div class=" logo">
				<a href="index.html"><img src={{ asset('images/logo.png') }} alt=""></a>
			</div>
		</div>
	</div>
	<div class="header-top">
		<div class="container">
		<div class="col-sm-5 col-md-offset-2  header-login">

			<ul >

			<!--<li><a href="auth/login">Login</a></li>
						<!--<li><a href="auth/register">Register</a></li>-->
				<?php if ((Session::get('google')=='true')): ?>
				<li>	<p id="header_color2" style="color: #d62728" >Welcome , <?php echo (Session::get('username')) ;?></p>

					<?php
					$data = file_get_contents('http://picasaweb.google.com/data/entry/api/user/'.Session::get('id').'?alt=json');
					$d = json_decode($data);
					$avatar = $d->{'entry'}->{'gphoto$thumbnail'}->{'$t'};
					?>
					<img src=<?php echo $avatar; ?>  height="42" width="42" style = "border-radius:20px;" >
				</li>
				<li><div id="header_color"><a href="./edituser/<?php echo (Session::get('username')) ;?>">Edit</a></div></li>


				<li><div id="header_color"><a onclick="signOut2()">Sign out</a></div></li>

			<?php else: ?>
				<?php if ((Session::get('facebook')!='true')): ?>
				<li><div id="header_color"><div class="g-signin2" data-width="150" data-height="20" data-longtitle="true"  data-onsuccess="onSignIn"></div></div></li>
				<?php endif; ?>
				<?php endif; ?>

			<?php if ((Session::get('facebook')=='true')): ?>
								<li>	<p id="header_color2" style="color: #d62728" >Welcome , <?php echo (Session::get('username')) ;?></p>
										<img src=<?php echo (Session::get('image')); ?>  height="42" width="42" style = "border-radius:20px;" >
								</li>
									<li><div id="header_color"><a href="{{url('edituser/')}}<?php echo (Session::get('username')) ;?>">Edit</a></div></li>

									<li><div id="header_color"><a href="{{url('sign_out')}}">signout</a></div></li>
								<?php else: ?>
				<?php if ((Session::get('google')!='true')): ?>
								<li><div id="header_color"><a onclick="login()"><!-- log in with facebook--><img src="http://www.blood4free.com/images/icons/login.png"  width="112" /></a></div></li>
				<?php endif; ?>


								<?php endif; ?>



				<?php if ((Session::get('facebook')!='true') && (Session::get('google')!='true') ): ?>
				<li><div id="header_color"><a href="./login"> log in</a></div></li>
				<li><a href="register">Register</a></li>
				<?php endif; ?>
				<li></li>
					</ul>
		</div>
		</div>
</div>
	@if(session('message')=='Success')


		<div id="dialogmessage" title="Thank you">
			<p>
				<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
				your
			</p>
			<p>
				<b>email address</b> has been successfully subscribed.
			</p>
		</div>
	@endif
			<div class="col-sm-5 header-social">
					<ul >
						<li><a href="#"><i></i></a></li>
						<li><a href="#"><i class="ic1"></i></a></li>
						<li><a href="#"><i class="ic2"></i></a></li>
						<li><a href="#"><i class="ic3"></i></a></li>
						<li><a href="#"><i class="ic4"></i></a></li>
					</ul>

			</div>
				<div class="clearfix"> </div>
		</div>
		</div>

		<div class="container">

			<div class="head-top">

		 <div class="col-sm-8 col-md-offset-2 h_menu4">
				<nav class="navbar nav_bottom" role="navigation">

 <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header nav_2">
      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

   </div>
   <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">

        <ul class="nav navbar-nav nav_1">
			<?php if ((Session::get('facebook'))=='true'): ?>

			<li><a class="color" href="{{url('categories')}}">Categories</a></li>
			<li><a class="color3" href="{{url('customlist')}}">Customized Request</a></li>
			<li><a class="color3" href="{{'trending'}}">Trending</a></li>
			<li><a class="color4" href="{{'latest'}}">Latest</a></li>
			<li><a class="color5" href="{{'/about'}}">About Us</a></li>
			<li ><a class="color6" href="{{'/contact'}}">Contact Us</a></li>

				<?php else: ?>

				<li><a class="color" href="{{url('categories')}}">Categories</a></li>
				<li><a class="color3" href="{{'/trending'}}">Trending</a></li>
				<li><a class="color5" href="{{'/trending'}}">About Us</a></li>
				<li ><a class="color6" href="{{'/trending'}}">Contact Us</a></li>

				<?php endif; ?>
        </ul>






     </div><!-- /.navbar-collapse -->

					@yield('banner')
</nav>
			</div>

				<div class="col-sm-2 search-right">
					<ul class="heart">

						  <li>
							  <?php if ((Session::get('facebook'))=='true'): ?>
							  @if(Session::has('flash_message'))
								  <div class="alert alert-success">
									  {{Session::get('flash_message')}}
								  </div>
							  @endif
							  @if(count($errors)>0)
								  <div class="alert alert-danger">
									  <ul>
										  @foreach($errors->all() as $er )
											  <li>
												  {{$er}}
											  </li>
										  @endforeach
									  </ul>
								  </div>

							  @endif
							  <form class="form" method="POST" action="{{url('search')}}">
								  <input type="hidden" name="_token" value="{{csrf_token()}}">

								  <input type="text" name="SearchKey" id="SearchKey" placeholder="Enter search key">

								  <button class="btn btn-primary">Search</button>
								  </form>
						<?php endif; ?>
					</ul>
					<div class="cart box_1">
						<!-- <a href="checkout.html">
                             <h3> <div class="total">
                                     <span class="simpleCart_total"></span></div>
                                 <img src="images/cart.png" alt=""/></h3>
                         </a>
                         <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->

					</div>
					<div class="clearfix"> </div>

					<!----->

					<!---pop-up-box---->
					<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!---//pop-up-box---->
					<div id="small-dialog" class="mfp-hide">
						<div class="search-top">
							<div class="login-search">
								<input type="submit" value="">
								<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
							</div>
							<p>Shopin</p>
						</div>
					</div>
					<script>
						$(document).ready(function() {
							$('.popup-with-zoom-anim').magnificPopup({
								type: 'inline',
								fixedContentPos: false,
								fixedBgPos: true,
								overflowY: 'auto',
								closeBtnInside: true,
								preloader: false,
								midClick: true,
								removalDelay: 300,
								mainClass: 'my-mfp-zoom-in'
							});

						});
					</script>


					<!----->
				</div>

			<div class="clearfix"></div>
		</div>
	</div>



@yield('content')





<!--banner-->

			<!--//products-->
			<!--brand-->
<!--rating
<form id="ratingsForm">
	<div class="stars">
		<input type="radio" name="star" class="star-1" id="star-1" />
		<label class="star-1" for="star-1">1</label>
		<input type="radio" name="star" class="star-2" id="star-2" />
		<label class="star-2" for="star-2">2</label>
		<input type="radio" name="star" class="star-3" id="star-3" />
		<label class="star-3" for="star-3">3</label>
		<input type="radio" name="star" class="star-4" id="star-4" />
		<label class="star-4" for="star-4">4</label>
		<input type="radio" name="star" class="star-5" id="star-5" />
		<label class="star-5" for="star-5">5</label>
		<span></span>
	</div>

</form>
<!--rating -->
			<div class="brand">
				<!--<div class="col-md-3 brand-grid">
					<img src={{ asset('images/ic.png') }} class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src={{ asset('images/ic1.png') }} class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src={{ asset('images/ic2.png') }} class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src={{ asset('images/ic3.png') }} class="img-responsive" alt="">
				</div>-->
				<div class="clearfix"></div>
			</div>
			<!--//brand-->
	<!--//content-->
	<!--//footer-->
<div class="footer">
	<div class="footer-middle">
		<div class="container">
			<div class="col-md-3 footer-middle-in">

				<p>Paintpal is the best place to blablaa</p>
			</div>

			<div class="col-md-3 footer-middle-in">
				<h6>Information</h6>
				<ul class=" in">
					<li><a href="{{url('/about')}}">About</a></li>
					<li><a href="{{url('/contact')}}">Contact Us</a></li>
					<li><a href="contact.html">Site Map</a></li>
				</ul>
				<ul class="in in1">
					<li><a href="#">Order History</a></li>
					<li><a href="wishlist.html">Wish List</a></li>
					<li><a href="login.html">Login</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Newsletter</h6>
						<span>Sign up for News Letter</span>
							<form  role="form" method="POST" action="{{ url('addsub') }}">
								{!! csrf_field() !!}
								<div class="{{ $errors->has('email') ? ' has-error' : '' }}">



									<i style="float:left;position: relative;" class="glyphicon glyphicon-envelope"></i>
									<input id="email" type="TEXT"  maxlength="100" size="27" onfocus="this.value='';" onblur="if (this.value == ''){this.value ='Enter your E-mail';}" placeholder="Enter your E-mail" name="email" value="{{ old('email') }}">

									@if ($errors->has('email'))
										<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								<!--<input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
								*/--><input type="submit" value="Subscribe">
									</div>
							</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<ul class="footer-bottom-top">

<!-- google_translate -->					<li>
							<div class="box">

								<div id="google_translate_element"></div>
								<script type="text/javascript">
									function googleTranslateElementInit() {
										new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false}, 'google_translate_element'); //remove the layout
									}
								</script>
								<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>


								<script type="text/javascript">
									function triggerHtmlEvent(element, eventName) {
										var event;
										if(document.createEvent) {
											event = document.createEvent('HTMLEvents');
											event.initEvent(eventName, true, true);
											element.dispatchEvent(event);
										} else {
											event = document.createEventObject();
											event.eventType = eventName;
											element.fireEvent('on' + event.eventType, event);
										}
									}
									<!-- Flag click handler -->
									$('.translation-links a').click(function(e) {
										e.preventDefault();
										var lang = $(this).data('lang');
										$('#google_translate_element select option').each(function(){
											if($(this).text().indexOf(lang) > -1) {
												$(this).parent().val($(this).val());
												var container = document.getElementById('google_translate_element');
												var select = container.getElementsByTagName('select')[0];
												triggerHtmlEvent(select, 'change');
											}
										});
									});

								</script></div>	</li>
					</ul>
					<p class="footer-class">&copy; 2016 PaintPal. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">Painrp</a> </p>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src={{ asset('js/simpleCart.min.js') }}> </script>
<!-- slide -->
<script src={{ asset('js/bootstrap.min.js') }}></script>
<!--light-box-files -->
		<script src={{ asset('js/jquery.chocolat.js') }}></script>
		<link rel="stylesheet" href={{ asset('css/chocolat.css') }} type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('a.picture').Chocolat();
		});
		</script>


</body>
</html>