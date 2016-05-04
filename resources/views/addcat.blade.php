@extends('master')

@section('content')

<div class="bottom-grids collections">
    <div class="container">

        <!-- Table of categories -->
        <div class="col-md-9 bottom-grids-left">

            <div class="content-mid">
                <h3>Current Categories</h3>
                <label class="line"></label>
            </div>

            @if($categories->count()>0)

                <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
                    <table class="table">
                        <thead>
                        <tr class="danger">
                            <th>#</th>
                            <th>Name Of Category</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $cat)


                            <tr class="warning">
                                <th scope="row">{{$cat->id}}</th>
                                <td>{{$cat->cat_name}}</td>
                                <td>{{$cat->cat_desc}}</td>
                                <td><a href="{{ url('category/view/' .$cat->id) }}">View</a></td>
                                <td>

                                    <a href="{{ url('category/delete/' .$cat->id) }}">Delete</a>

                                    <!-- <button value ="Delete" href="#"  type="button" onClick="return confirmChange()"></button>

                            <script>

                                function confirmChange() {

                                    var answer = confirm("Are you sure?");

                                    if (answer == true) {

                                        href="{{ url('category/delete/' .$cat->id) }}"

                                        return redirect({{ url('category/delete/' .$cat->id) }});

                                    } else {
                                        //do something
                                        return false;
                                    }
                                }
                            </script>-->

                                </td></tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            @endif

        </div>
        <!-- /table -->

        <!-- Add category -->
        <div class="col-md-3 bottom-grids-right">

            <div class="content-mid">
                <h3>Add Category</h3>
                <label class="line"></label>
            </div>

            <div class="bs-example" data-example-id="simple-horizontal-form">

                @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form  method="POST" action="{{url('category/save') }}" class="form-horizontal">


                    <input type="hidden" name="_token" value="{{ csrf_token() }}">



                    <div class="form-group">
                        <input type="text" name="cat_name" id="cat_name" placeholder="Name of Category" class="form-control"
                               value="{{ old('cat_name') }}">
                    </div>

                    <div class="form-group">
                        <input type="text" name="cat_desc" id="cat_desc" placeholder="Description" class="form-control"
                               value="{{ old('cat_desc') }}">
                    </div>



                    <button class="btn btn-lg btn-primary">Add</button>

                </form>
            </div>


        </div>
        <!-- /Add category -->
    </div>
</div>

@stop