@extends('master')

@section('content')

    <div class="bottom-grids collections">
        <div class="container">

            <!-- Table of categories -->
            <div class="col-md-9 bottom-grids-left">

                <div class="content-mid">
                    <h3>Requests</h3>
                    <label class="line"></label>
                </div>

                <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
                    <table class="table">
                        <thead>
                        <tr class="danger">
                            <th>#</th>
                            <th>Request Name</th>
                            <th></th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($crequests as $cr)


                            <tr class="warning">
                                <th scope="row">{{$cr->id}}</th>
                                <td>{{$cr->heading}}</td>
                                <td><a href="{{ url('a_customlist/view/' .$cr->id) }}">View</a></td>

                                <td>{{$cr->status}}</td></tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>



@stop