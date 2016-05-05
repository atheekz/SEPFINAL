@extends('master')

@section('content')

    <script>
        function initialize(){
            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext("2d");

            var image=new Image();

            image.src = "{{$crequest->code}}";

            //alert(test);

            ctx.drawImage(image, 0, 0);
        }

        function drawImage($test){

            //ReDrawing


            var test = $test;



            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext("2d");

            var image=new Image();

            image.src = test;

            //alert(test);

            ctx.drawImage(image, 0, 0);
        }

        function back(){
            window.location='customlist';
        }

    </script>
    <div class="bottom-grids collections">
        <div class="container">
            <div class="col-md-9 bottom-grids-left">
                <div class="content-mid">
                    <h3>My Request</h3>
                    <label class="line"></label>
                </div>
                <canvas id="canvas" width="800" height="500"  style =" left:10%; border:1px solid">
                    This text is displayed if your browser does not support HTML5 Canvas.
                </canvas>
                <div class="form-group"><button class="btn btn-lg btn-primary" onClick=drawImage("{{$crequest->code}}")>Draw</button></div>
            </div>

            <div class="col-md-3 bottom-grids-right">
                <div class="content-mid">
                    <h3>Details</h3>
                    <label class="line"></label>
                </div>
                <div class="form-group">
                    <div class="col-md-9 bottom-grids-left">Heading : </div>
                    <div class="col-md-3 bottom-grids-right"><input contenteditable="false" type="text" value="{{$crequest->heading}}"></div>
                </div>
                <div class="form-group"><div class="col-md-9 bottom-grids-left">Text : </div><div class="col-md-3 bottom-grids-right"><input contenteditable="false" type="text" value="{{$crequest->text}}"></div></div>
                <div class="form-group"><div class="col-md-9 bottom-grids-left">Color : </div><div class="col-md-3 bottom-grids-right"><input contenteditable="false" type="text" value="{{$crequest->color}}"></div></div>

                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation"><a href="{{url('customlist')}}">Back</a></li>
                </ul>
            </div>
        </div>

        @if($crequest->Status=='Completed')

            <div class="col-md-3 item-grid simpleCart_shelfItem">
                <div class=" mid-pop">
                    <div class="pro-img">
                        <div id="image">
                            <ul>
                                <li><img src="{{ URL::asset($crequest->file_path) }}" class="img-responsive" alt=""></li>
                            </ul>
                        </div>
                        <div class="zoom-icon ">
                            <a class="picture" href="{{ URL::asset($crequest->file_path) }}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                            <!--<a href="#"><i class="glyphicon glyphicon-menu-right icon"></i></a>-->
                        </div>
                    </div>
                    <div class="mid-1">



                        <div class="women">
                            <div class="women-top">
                                <span>{{ $crequest->heading }}</span>

                            </div>
                        </div>
                        <!--<div class="img item_add">
                                            <a href="{{ url('category/view-cat/' .$crequest->id) }}"><img src="images/ca.png" alt=""></a>
                                        </div> -->
                        <div class="clearfix"></div>

                        <div class="mid-2">

                            <!--<div class="block">
                                <a href="{{ url('image/delete/' .$crequest->id) }}">Delete</a>
                            </div>-->

                            <div class="clearfix"></div>
                        </div>



                    </div>
                </div>
            </div>
            @endif

    </div>
@stop