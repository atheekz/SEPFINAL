@extends('adminmaster')

@section('content')

    <div class="content-mid">

        <h3>List of all Registered Users</h3>
        <label class="line"></label>
    </div>

<table class="table table-striped table-bordered table-responsive">
    <tr>
        <th> Name</th>
        <th>User ID</th>
        <th>Email</th>
        <th></th>
    </tr>
    @foreach($data as $dat)
        <tr>

            <td>

                {{$dat->username}}
                <br>


            </td>
            <td>
                {{$dat->id}}
                <br>
            </td>
            <td>
                {{$dat->email}}
                <br>
            </td>
            <td>
                <a class="btn btn-primary" href="{{url('user/view/'.$dat->id)}}"> View </a>
            </td>

        </tr>
@endforeach

    @endsection