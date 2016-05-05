@include('master')

@section('content')

    <div class="content-mid">

        <h3>Trending Items</h3>
        <label class="line"></label>
    </div>



    <table class="table table-striped table-bordered table-responsive">

        @foreach($trend as $res)
        <tr>
            <th> </th>
            <th></th>

        </tr>

            <tr>

            <tr>
                <td>Image Name</td>
                <td>{{$res->id}}</td>
            </tr>

            <tr>
                <td>Image Preview</td>
                <td class="picture"><img src="{{$res->file_path}}"></td>
            </tr>




            </tr>

@endforeach






    </table>

    {{$trend->links()}}

@endsection