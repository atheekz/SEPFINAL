
<!--header-->
<!--menu-->

@extends('master')

@section('content')

        <!-- end menu -->

<!--banner-->

<!--content-->

<!--products-->
<div class="content-mid">
    <h3>Categories</h3>
    <label class="line"></label>
    <div class="mid-popular">

        @foreach($categories as $categories)
            @foreach($categories->images as $images)
                @if($images->id == $categories->id)

                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">

                                <img src="{{ ($images->file_path) }}" class="img-responsive" alt="">

                                <div class="zoom-icon ">
                                    <!-- <a class="picture" href="{{ ($images->file_path) }}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>-->
                                    <a href="{{ url('category/view-cat/' .$categories->id) }}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">



                                <div class="women">
                                    <div class="women-top">
                                        <span>{{ $categories->cat_name }}</span>
                                        <h6><a href="{{ url('category/view-cat/' .$categories->id) }}">{{ $categories->cat_desc }}</a></h6>
                                    </div>
                                </div>
                                <!--<div class="img item_add">
                                                        <a href="{{ url('category/view-cat/' .$categories->id) }}"><img src="images/ca.png" alt=""></a>
                                                    </div> -->
                                <div class="clearfix"></div>

                                <div class="mid-2">
                                    <p ><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <!--<div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>-->

                                    <div class="clearfix"></div>
                                </div>



                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach

        <div class="clearfix"></div>
    </div>
</div>

<!--//products-->

<!--//content-->
<!--//footer-->
@stop