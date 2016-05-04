@extends('master')

@section('content')

    <table class="table table-striped table-bordered table-responsive">
        <tr>
            <th>Image Name</th>
            <th>Image Preview</th>
            <th></th>
        </tr>
            @foreach($images as $img)
        <tr>
            <td>{{$img['file_name']}}</td>

                    <td><img src="{{$img['file_path']}}"></td>

            <td><a class="btn btn-primary" href="{{url('viewimage/'.$img->id)}}">View Image Details</a></td>
                </tr>

                @endforeach
    </table>

    @endsection
