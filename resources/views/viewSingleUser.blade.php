@include('adminmaster')

@section('content')


    <table class="table table-striped table-bordered table-responsive">


        <tr>
            <td>
                User ID

            </td>
            <td>
                {{$users->id}}

            </td>
        </tr>
        <tr>
            <td>
                Email

            </td>
            <td>
                {{$users->email}}

            </td>
        </tr>

        <tr>
            <td>
                Name

            </td>
            <td>
                {{$users->username}}

            </td>
        </tr>



        <tr><td>

            </td>
            <td>
                <a class="btn btn-danger" href="{{url('deleteuser/'.$users->id)}}"> Delete User</a>

            </td>

        </tr>

        <table>



@endsection