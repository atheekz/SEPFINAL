@extends('master')

@section('content')



    <table class="table table-striped table-bordered table-responsive">
        <tr>
            <th> Image Title</th>
            <th></th>
            <th>Description</th>
            <th></th>
        </tr>
        <tr>

            <td>

                {{$image_det->title}}
                <br>


            </td>
            <td>
                {{$image_det->producut_description}}
                <br>
            </td>
            <td>
                <img src="{{$image->file_path}}">
                <br>
            </td>
            <td>
                <a class="btn btn-danger" href="{{url('deleteImage/'.$image->id)}}"> Delete Image </a>
                <a class="btn btn-primary" href="{{url('editImage/'.$image->id)}}">Edit Image</a>
            </td>

        </tr>



@endsection