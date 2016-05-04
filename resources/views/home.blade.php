@extends('master')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
                <div class="panel-body">

                </div>

@stop
