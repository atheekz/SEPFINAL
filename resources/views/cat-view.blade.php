@extends('master')

@section('content')

    <div class="content-mid">
        <h3>{{ $category->cat_name }}</h3>
        <label class="line"></label>

        <p>{{$category->cat_desc}}</p>

        <div class="mid-popular">


            @foreach($category->images as $images)

                <div class="col-md-3 item-grid simpleCart_shelfItem">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <img src="{{ URL::asset($images->file_path) }}" class="img-responsive" alt="">
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
                                <p ><label>$100.00</label><em class="item_price">$70.00</em></p>


                                <div class="clearfix"></div>
                            </div>



                        </div>
                    </div>
                </div>
            @endforeach



            <div class="clearfix"></div>
        </div>
    </div>

    <ul class="nav nav-pills" role="tablist">
        <li role="presentation"><a href="{{url('categories')}}">Back</a></li>
    </ul>

@stop