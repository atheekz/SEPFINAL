@extends('master')

@section('content')

    @if($res->count()>0)

    <center>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Notification</h3>
            </div>
            <div class="panel-body">
                Image Succesfully Deleted !
                <h1 class="grid2">
                    <a href="{{url('/home')}}" class="label label-success">Go Back to Home </a>

                </h1>
            </div>
        </div>
    </center>
    @else
        {{"error could not delete image"}}

@endsection