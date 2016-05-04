@extends('master')

@section('content')


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


@stop