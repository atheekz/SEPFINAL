@extends('master')

@section('content')
    <script>
        function redirect(){
            window.location='custom_cat';
        }
    </script>

    <div class="bottom-grids collections">
        <div class="container">

            <!-- Table of categories -->
            <div class="col-md-9 bottom-grids-left">

                <div class="content-mid">
                    <h3>My Requests</h3>
                    <label class="line"></label>
                </div>

                    <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
                        <table class="table">
                            <thead>
                            <tr class="danger">
                                <th>#</th>
                                <th>Request Name</th>
                                <th></th>
                                <th></th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($crequests as $cr)


                                <tr class="warning">
                                    <th scope="row">{{$cr->id}}</th>
                                    <td>{{$cr->heading}}</td>
                                    <td><a href="{{ url('customlist/view/' .$cr->id) }}">View</a></td>
                                    <td>

                                        <a href="{{ url('customlist/delete/' .$cr->id) }}">Delete</a>

                                        <!-- <button value ="Delete" href="#"  type="button" onClick="return confirmChange()"></button>-->


                                    </td>
                                <td>{{$cr->status}}</td></tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                <button class="btn btn-lg btn-primary" onClick="redirect()">Create New Request</button>

            </div>

    </div>
</div>



@stop