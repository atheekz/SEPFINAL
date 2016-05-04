@extends('master')

@section('content')

    @if(session('message')=='error')


        <div id="dialogmessage" title=" Error">
            <p>
                <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                Invalid username
            </p>
            <p>
                <b>username</b> or<b> password</b>
            </p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                        <form  role="form" method="POST" action="{{ url('/loginv') }}">

                        {!! csrf_field() !!}

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

                                <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <i style="float:left;position: relative;"  class="glyphicon glyphicon-user"></i>

                                    <input id="username" type="text" placeholder=" Enter Username" name="username" value="{{ old('username') }}" >
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif

                                </div>

</div>


                            <div class="login-mail">

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="glyphicon glyphicon-lock"></i>
                                <input id="pass" type="password" placeholder="  Enter Password" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div id="final_submit">
                            <button type="submit"  class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Login
                            </button>
                        </div>

                    </form>




                </div>
            </div>
        </div>
</div>

      <!--
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>

                            </div>



                                <button type="submit" class="btn btn-primary">
                                    <i></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

                    </form>
-->
@stop
