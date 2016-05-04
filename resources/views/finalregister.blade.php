@extends('master')
<?php /*<script src={{ asset('ajax/register.js') }} type="text/javascript"></script>*/
?>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>



<script>
    jQuery( document ).ready(function( $ ) {


        //$('#final_submit').hide();



    });
</script>
@section('content')
    <div class="container">
        <?php /*@include('flash::message')
        @if (Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ Session::get('flash_notification.message') }}
            </div>
        @endif*/ ?>

            <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form  role="form" method="POST" action="{{ url('/register') }}">

                            {!! csrf_field() !!}

                            <div class="login-mail">

                                <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <i style="float:left;position: relative;"  class="glyphicon glyphicon-user"></i>

                                    <input id="username" type="text" placeholder="Username" name="username" value="{{ old('username') }}" >
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <!-- <?php /*   <div class="login-mail">

                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <i style="float:left;position: relative;"  class="glyphicon glyphicon-user"></i>

                                    <input id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" >
                                    @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif

                                </div>

                            </div> */ ?> -->


                            <div class="login-mail">
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">



                                    <i style="float:left;position: relative;" class="glyphicon glyphicon-envelope"></i>
                                    <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>
                            <div class="login-mail">
                                <div class="{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                                    <i style="float:left;position: relative;" class="glyphicon glyphicon-phone"></i>
                                    <input id="phoneNo" type="text" placeholder="Phone Number" maxlength="10" name="phoneNo" value="{{ old('phoneNo') }}">

                                    @if ($errors->has('phoneNo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="login-mail">

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <i class="glyphicon glyphicon-lock"></i>
                                    <input id="pass" type="password" placeholder="Password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="login-mail">

                                <div  class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <i class="glyphicon glyphicon-lock"></i>


                                    <input id="pass_con" type="password"  placeholder="Confirm Password " name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- <a  class="" id="check" > Select an option to get a verification code</a>
                             <select id="type" name="children" class="form-control">
                                 <option class="option_custom" value="email">Email</option>
                                 <option class="option_custom" value="sms">SMS</option>

                             </select>
                             <br/>
                             <a  class="btn btn-primary" id="check" > Get validation code</a>
                             <!--<div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                     <button type="submit" class="btn btn-primary">
                                         <i class="fa fa-btn fa-user"></i>Register
                                     </button>
                                 </div>
                             </div>-->

                            <div id="final_submit">
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>

                        </form>




                    </div>
                </div>
            </div>
        </div>

    </div>



@stop
