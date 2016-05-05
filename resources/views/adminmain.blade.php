@extends('master')


@section('content')

<div class="brand">
    <div class="col-md-3 brand-grid">
        <a href="{{url('/viewall')}}"}> <img src="images/ic.png" class="img-responsive" alt=""> View Orders </a>
    </div>
    <div class="col-md-4 brand-grid">
        <a href="{{url('/viewimages')}}"}><img src="images/ic1.png" class="img-responsive" alt=""> View Images </a>
    </div>
    <div class="col-md-3 brand-grid">
        <a href="{{url('/list')}}"}> <img src="images/ic2.png" class="img-responsive" alt="">View Users</a>
    </div>
    <!-- <div class="col-md-3 brand-grid">
            <a href="{{url('/viewusers')}}"}>  <img src="images/ic3.png" class="img-responsive" alt="">View Orders</a>
        </div>-->
    <div class="clearfix"></div>
</div>


@endsection