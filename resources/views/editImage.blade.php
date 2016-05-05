@extends('master')

@section('content')


    @foreach($image as $img)
        <table class="table table-striped table-bordered table-responsive">
            <tr>
                <td>Image Preview</td>
                <td><img src="{{$img->file_path}}"> </td>
            </tr>

        @endforeach

        @foreach($details as $det)

    <form class="form" method="POST" action="{{url('edit')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">


        <table class="table table-striped table-bordered table-responsive">
            <tr>
                <th> </th>
                <th></th>

            </tr>

                <input type="hidden" id="id" name="id" value="{{$det->id}}">

            <tr>
                <td>Image Title</td>
                <td><input type="text" id="title" name="title" placeholder="{{$det->title}}"> </td>
            </tr>

            <tr>
                <td>Quick Overview</td>
                <td><input type="text" id="overview" name="overview" placeholder="{{$det->quick_overview}}"> </td>
            </tr>

            <tr>
                <td>Product Decsiption</td>
                <td><input type="text" id="desc" name="desc" placeholder="{{$det->producut_description}}"> </td>
            </tr>

            <tr>
                <td>Additional Information</td>
                <td><input type="text" id="addinfo" name="addinfo" placeholder="{{$det->add_info}}"> </td>
            </tr>

            <tr>
                <td>Reviews</td>
                <td><input type="text" id="reviews" name="reviews" placeholder="{{$det->reviews}}"> </td>
            </tr>

            <tr>
                <td>Cost</td>
                <td><input type="text" id="cost" name="cost" placeholder="{{$det->cost}}"> </td>
            </tr>

    <tr> <td> <button class="btn btn-primary">Save Changes</button></td></tr>

        <form>

@endforeach
    @endsection