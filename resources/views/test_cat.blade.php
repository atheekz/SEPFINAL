@extends('master')

@section('content')

    <body>


    <section>

        <canvas id="canvas" width="800" height="500" style =" border:1px solid">
            This text is displayed if your browser does not support HTML5 Canvas.
        </canvas>

        <button class="btn btn-lg btn-primary" onClick=drawImage("{{$test->code}}")>Draw</button>

        </div>

    </section>

    <script>
        function drawImage($test){

            //ReDrawing


            var test = $test;



            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext("2d");

            var image=new Image();

            image.src = test;

            //alert(test);

            ctx.drawImage(image, 0, 0);
        }


    </script>
    </body>

    @stop