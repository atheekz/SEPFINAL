@extends('master')



@section('content')



    @if($result->count()>0)
        <table class="table table-striped table-bordered table-responsive">

            <tr>
                <th>
                    Image Name
                </th>

                <th>
                    Image
                </th>
                <th>

                </th>
            </tr>

            @foreach($result as $res)
                <tr>

                    <td>
                        {{$res->file_name}}

                    </td>
                    <td>
                        <img src="{{$res->file_path}}">

                    </td>

                    <td>
                        <form class="form" type="POST" action="{{url('makepurchase')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <input type="hidden" name="ImageID" id="ImageID" value="{{$res->id}}">
                            <input type="hidden" name="ImageName" id="ImageName" value="{{$res->file_name}}">
                            <input type="hidden" name="ImagePath" id="ImagePath" value="{{$res->file_path}}">
                            <input type="hidden" name="Count" id="Count" value="{{$res->Count}}">
                            <!--<button class="btn btn-primary">Reserve Image</button>-->

                        </form>

                        <a class="btn btn-primary" href="{{url('category/details-view/'.$res->id)}}">View Image Details</a>


                    </td>
                </tr>
            @endforeach

        </table>
    @else

        <center>

            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Notification</h3>
                </div>
                <div class="panel-body">
                    Sorry , there are no search results matching your Search Key !
                    <h1 class="grid2">
                        <a href="{{url('/homeF')}}" class="label label-danger">Go Back to Home </a>

                    </h1>
                </div>
            </div>

        </center>
    @endif
@endsection