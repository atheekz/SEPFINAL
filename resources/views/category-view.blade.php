@extends('master')

@section('content')


<!DOCTYPE HTML>

<html>

<head>
    <title>Paint Pal</title>
    <link href="{{ URL::asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="{{ URL::asset('/css/style4.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
    <!--- start-rate---->
    <script src="{{ URL::asset('/js/jstarbox.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('/css/jstarbox.css') }}" type="text/css" media="screen" charset="utf-8" />
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
                        return val;
                    }
                })
            });
        });
    </script>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.css">
</head>

<body>

<div class="bottom-grids collections">
    <div class="content-mid">






        <h3>{{$category->cat_name}}</h3>

        <label class="line"></label>

        <div class="form-group">
            <h4>{{$category->cat_desc}}</h4>
        </div>

        <div class="col-md-9 bottom-grids-left">


            @foreach($category->images as $images)

                <div class="col-md-3 item-grid simpleCart_shelfItem">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <div id="image">
                                <ul>
                                    <li><img src="{{ URL::asset($images->file_path) }}" class="img-responsive" alt=""></li>
                                </ul>
                            </div>
                            <div class="zoom-icon ">
                                <a class="picture" href="{{ URL::asset($images->file_path) }}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                <!--<a href="#"><i class="glyphicon glyphicon-menu-right icon"></i></a>-->
                            </div>
                        </div>
                        <div class="mid-1">



                            <div class="women">
                                <div class="women-top">
                                    <span>{{ $category->cat_name }}</span>

                                </div>
                            </div>
                            <!--<div class="img item_add">
                                            <a href="{{ url('category/view-cat/' .$category->id) }}"><img src="images/ca.png" alt=""></a>
                                        </div> -->
                            <div class="clearfix"></div>

                            <div class="mid-2">

                                <div class="block">
                                    <a href="{{ url('image/delete/' .$images->id) }}">Delete</a>
                                </div>

                                <div class="clearfix"></div>
                            </div>



                        </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>


            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>


            <div >
                <form method="POST" action="{{url('category/do-upload')}}" class="dropzone" id="addImages">
                    <input type="hidden" value="{{($category->id)}}" id="cat_id" name="cat_id">
                </form>

                {{ csrf_field() }}

                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation"><a href="{{url('addcat/list')}}">Back</a></li>
                </ul>

            </div>
        </div>

        <div class="col-md-3 bottom-grids-right">
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{url('category/update/' .$category->id) }}">


                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="bs-example" data-example-id="simple-horizontal-form">
                    <div class="form-group">
                        <input type="text" name="cat_name" id="cat_name" class="form-control"
                               value="{{ $category->cat_name }}">
                    </div>

                    <div class="form-group">
                        <input type="text" name="cat_desc" id="cat_desc" class="form-control"
                               value="{{ $category->cat_desc }}">
                    </div>


                    <button class="btn btn-lg btn-primary">Update</button>






                </div>


            </form>
        </div>


    </div>
</div>


<script src="{{ URL::asset('/js/simpleCart.min.js') }}"> </script>
<!-- slide -->
<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<!--light-box-files -->
<script src="{{ URL::asset('/js/jquery.chocolat.js') }}"></script>
<!--<script src="{{ URL::asset('/js/app.js') }}"></script> -->
<link rel="stylesheet" href="{{ URL::asset('/css/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('a.picture').Chocolat();
    });
</script>

</body>

</html>

@stop