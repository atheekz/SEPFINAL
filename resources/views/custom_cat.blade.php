@extends('master')

@section('content')

    <script>

        var stage;
        var SIZE = 50;

        var hCount=0;
        var tCount=0;

        var canvas;



        function initialise() {
            //resize canvas to full width and height

            canvas = document.getElementById("canvas");

            canvas.width = 800;
            canvas.height = 500;

            stage = new createjs.Stage(canvas);

            //alert("i loaded");

            addTextHeading();
            addText();
            //addTe1xt("Text Area");

            /*addCircle(canvas.width/2 - (SIZE * 2.5), canvas.height/2, SIZE, "#e74c3c");
            addStar(canvas.width/2, canvas.height/2, SIZE, "#f1c40f");
            addRoundedSquare(canvas.width/2 + (SIZE * 2.5), canvas.height/2, SIZE * 2, 5, "#9b59b6");*/

            stage.update();
        }

        function addCircle(x, y, r, fill) {
            var circle = new createjs.Shape();
            circle.graphics.beginFill(fill).drawCircle(0, 0, r);
            circle.x = x;
            circle.y = y;
            circle.name = "circle";
            circle.on("pressmove",drag);
            stage.addChild(circle);
        }

        function addStar(x, y, r, fill) {
            var star = new createjs.Shape();
            star.graphics.beginFill(fill).drawPolyStar(0, 0, r, 5, 0.6, -90);
            star.x = x;
            star.y = y;
            star.name = "star";
            star.on("pressmove",drag);
            stage.addChild(star);
        }

        function addRoundedSquare(x, y, s, r, fill) {
            var square = new createjs.Shape();
            square.graphics.beginFill(fill).drawRoundRect(0, 0, s, s, r);
            square.x = x - s/2;
            square.y = y - s/2;
            square.name = "square";
            square.on("pressmove",drag);
            stage.addChild(square);
        }

        function addTextHeading(){



            if(hCount<1){
                var text=new createjs.Text("Heading","25px Arial");

                text.x=300;
                text.y=100;

                //alert("hai");

                text.on("pressmove",drag);

                stage.addChild(text);
                stage.update();
                hCount++;
            }
            else
                alert("Only one Heading is allowed per request.")

        }

        function addText() {



            if(tCount<1){
                var text = new createjs.Text("Text Area","20px Arial");

                text.x = 300;
                text.y = 300;

                //alert("hai");

                text.on("pressmove", drag);

                stage.addChild(text);
                stage.update();
                tCount++;
            }
            else
                    alert("Only one text area is allowed per request.")
        }



        function drag(evt) {
            // target will be the container that the event listener was added to
            if(evt.target.name == "square") {
                evt.target.x = evt.stageX - SIZE;
                evt.target.y = evt.stageY - SIZE;
            }
            else  {
                evt.target.x = evt.stageX;
                evt.target.y = evt.stageY;
            }

            // make sure to redraw the stage to show the change
            stage.update();
        }

        function saveImage(){



            var canvas = document.getElementById("canvas");

            if (canvas.getContext) {
                var ctx = canvas.getContext("2d");                // Get the context for the canvas.
                var myImage = canvas.toDataURL("images/png");       // Get the data as an image.
            }

            /*$img = myImage.replace('data:image/png;base64,', '');

             $img = $img.replace(' ', '+');

             $data = atob($img);*/

            var form = document.forms['addImages'];

            var formElement = form.elements['cat_id'];

            formElement.value=myImage;

        }

        function drawCircle(){

            addCircle(canvas.width/2 - (SIZE * 2.5), canvas.height/2, SIZE, "#006699");
            stage.update();
        }
        function drawStar(){

            addStar(canvas.width/2, canvas.height/2, SIZE, "#f1c40f");
            stage.update();
        }
        function drawSquare(){

            addRoundedSquare(canvas.width/2 + (SIZE * 2.5), canvas.height/2, SIZE * 2, 5, "#9b59b6");
            stage.update();
        }


        function add() {


            for (var i = stage.children.length - 1; i >= 0; i--)
            {
                stage.removeChild(stage.children[i]);
            }

            hCount=0;
            tCount=0;

            stage.update();

            //Create an input type dynamically.
            /*var textfield = document.createElement("input");

            //Assign different attributes to the element.
            textfield.setAttribute("type", Text);
            textfield.setAttribute("id", "TextField"+i);
            textfield.setAttribute("placeholder", "Text Field "+i);




            var foo = document.getElementById("fooBar");

            //Append the element in page (in span).
            foo.appendChild(textfield);*/

        }

        function clear(){

            alert("hello");
            for (var i = stage.children.length - 1; i >= 0; i--)
            {
                stage.removeChild(stage.children[i]);
            }



            stage.update();
        }

    </script>



<div class="bottom-grids collections">
    <div style="width:95%" class="container">

        <div class="content-mid">
            <h3>Customized Request</h3>
            <label class="line"></label>
        </div>

        <div class="col-md-3 bottom-grids-right">
            <div class="content-mid">
                <div class="form-group"><button class="btn btn-lg btn-primary" onClick="drawCircle()">Add Circle</button></div>
                <div class="form-group"><button class="btn btn-lg btn-primary" onClick="drawStar()">Add Star</button></div>
                <div class="form-group"><button class="btn btn-lg btn-primary" onClick="drawSquare()">Add Square</button></div>
                <div class="form-group"><button class="btn btn-lg btn-primary" onClick="addTextHeading()">Add Heading</button></div>
                <div class="form-group"><button class="btn btn-lg btn-primary" onClick="addText()">Add Text Area</button></div>
                <div class="form-group"><button class="btn btn-lg btn-primary"  onClick="add()">Clear</button></div>





            </div>

        </div>



        <form method="POST" action="{{url('testsave')}}"  id="addImages" name ="addImages">
            {{ csrf_field() }}


            <canvas id="canvas" width="800" height="500"  style =" left:10%; border:1px solid">
                This text is displayed if your browser does not support HTML5 Canvas.
            </canvas>

            <input type="hidden" value ="" id="cat_id" name="cat_id">


            <div class="form-group"> <input type="text" id="heading" name="heading" placeholder="Heading"> </div>
            <div class="form-group"> <input type="text" id="text_area" name="text_area" placeholder="Text Area"> </div>
            <div class="form-group">Color: <input id="color" class="jscolor" name="color" value="ab2567" autocomplete="off"></div>

            <div class="col-md-3 bottom-grids-right">
                <div class="form-group">
                    <button style ="" class="btn btn-lg btn-primary" onClick="saveImage()" id="button">Save</button>
                </div>
            </div>
        </form>



    </div>

</div>




<script src="https://code.createjs.com/easeljs-0.8.2.min.js"></script>




@stop