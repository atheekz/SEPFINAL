@extends('master')

@section('content')




    <div class="content-mid">

        <h3>Latest Items</h3>
        <label class="line"></label>
    </div>
    <table class="table table-striped table-bordered table-responsive">
        <tr>
            <th> </th>
            <th></th>

        </tr>
        @foreach($res as $result)
            <tr>

            <tr>
                <td>Image Name</td>
                <td>{{$result->id}}</td>
            </tr>

            <tr>
                <td>Image Preview</td>
                <td class="picture"><img src="{{$result->file_path}}"></td>
            </tr>

        @endforeach


    </table>

    {{$res->links()}}


@endsection