@extends('master')

@section('content')


    <form method="POST" action="{{url('details/save/' .$data->id)}}">
        <div class="col-md-9 bottom-grids-left">
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Title : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="title"></div>
            </div>
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Overview : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="overview"></div>
            </div>
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Product Description : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="p_desc"></div>
            </div>
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Info : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="info"></div>
            </div>
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Cost : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="cost"></div>

            </div>
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Longitude : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="lat"></div>

            </div>
            <div class="form-group">
                <div class="col-md-9 bottom-grids-left">Latitude : </div>
                <div class="col-md-3 bottom-grids-right"><input type="text" id="lon"></div>

            </div>
        </div>

        <button class="btn btn-lg btn-primary">Save</button>

    </form>

    @stop