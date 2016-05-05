@include('master')

@section('content')


@foreach($users as $u)

    <table class="table table-striped table-bordered table-responsive">


        <tr>
            <td>
                User ID

            </td>
            <td>
                {{$u->id}}

            </td>
        </tr>
        <tr>
            <td>
                Email

            </td>
            <td>
                {{$u->email}}

            </td>
        </tr>

        <tr>
            <td>
                Name

            </td>
            <td>
                {{$u->username}}

            </td>
        </tr>



        <tr><td>

            </td>
            <td>
                <a class="btn btn-danger" href="{{url('deleteuser/'.$u->id)}}"> Delete User</a>

            </td>

        </tr>

        <table>
    @endforeach


@endsection