@extends('master')



                <?php if ((Session::get('facebook'))=='true'): ?>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
@endif
<? endif; ?>



@section('content')



    <div class="content">
        <div class="container">
            <div class="content-top">
                <div class="col-md-6 col-md">
                    <div class="col-1">
                        <a href="{{url('viewimage')}}" class="b-link-stroke b-animate-go  thickbox">
                            <img src="images/pi.jpg" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Nature</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Paintings of Nature</h3></div></a>

                        <!--<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
                    </div>
                    <div class="col-1">
                        <a href="{{url('viewimage')}}" class="b-link-stroke b-animate-go  thickbox">
                            <img src="images/pi.jpg" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Nature</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Paintings of Nature</h3></div></a>

                        <!--<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
                    </div>
                    <div class="col-3">
                        <a href="single.html"><img src="images/pi2.jpg" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Nature</p>
                                <label></label>
                                <h5>Paintings of Nature</h5>
                            </div></a>
                    </div>
                </div>
                <div class="col-md-6 col-md1">
                    <div class="col-3">
                        <a href="single.html"><img src="images/pi1.jpg" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Medevial</p>
                                <label></label>
                                <h5>Paintings of Medivial era</h5>
                            </div></a>
                    </div>
                    <div class="col-3">
                        <a href="single.html"><img src="images/pi2.jpg" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Sky</p>
                                <label></label>
                                <h5>Painting of night Skies</h5>
                            </div></a>
                    </div>
                    <div class="col-3">
                        <a href="single.html"><img src="images/pi3.jpg" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Modern</p>
                                <label></label>
                                <h5>Paintings of moderns stuff</h5>
                            </div></a>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <!--products-->

            <!--//products-->
            <!--brand-->

            <!--//brand-->
        </div>

    </div>


@stop
