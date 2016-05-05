

@extends('master')
<?php /*<script src={{ asset('ajax/register.js') }} type="text/javascript"></script>*/
?>
        <!--
	<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Your Website Title" />
	<meta property="og:description"   content="Your description" />
	<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />


-->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>

<script type="text/javascript"
        src="http://maps.google.com/maps/api/js?sensor=true"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--facebook-->
<script>
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.


        }
    }
    window.fbAsyncInit = function() {
        FB.init({
            /*            appId      : '1192320307463956',
             cookie     : true,  // enable cookies to allow the server to access
             // the session
             xfbml      : true,  // parse social plugins on this page
             version    : 'v2.2' // use version 2.2
             */

            appId      : '1716124405299360',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.5'
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function login(){
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    window.location="../app/login_ajax/"+response.name+"/"+response.id+"";
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
    }


</script>
<!-- facebook -->



<style type="text/css">

    div#map_canvas { width:100%; height:70%; }
    div#info { width:100%; overflow:hidden; text-align:center; top:0;
        left:0; }
    .lightBox {
        filter:alpha(opacity=60);
        -moz-opacity:0.6;
        -khtml-opacity: 0.6;
        opacity: 0.6;
        background-color:black;

    }
</style>

<script type="text/javascript">
    var map;
    var direction_golbal_variable_latlon;
    var infowindow = null;

    //directions
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();

    function initialise() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var latlng = new google.maps.LatLng(7.0000,81.0000);
        direction_golbal_variable_latlon=new google.maps.LatLng(7.0000,81.0000);
        var myOptions = {
            zoom: 4,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            styles: [
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        { "visibility": "on" },
                        { "weight": 1.6 },
                        { "hue": "#2200ff" }
                    ]
                },{
                    "stylers": [
                        { "hue": "#ff0022" }
                    ]
                },{
                    "featureType": "water",
                    "stylers": [
                        { "hue": "#00b2ff" }
                    ]
                },{
                    "featureType": "transit.station.rail",
                    "stylers": [
                        { "hue": "#1900ff" }
                    ]
                },{
                    "featureType": "transit.station.bus",
                    "stylers": [
                        { "hue": "#ffdd00" },
                        { "lightness": 5 }
                    ]
                },{
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        { "hue": "#b2ff00" }
                    ]
                },{
                    "featureType": "transit",
                    "elementType": "geometry.fill",
                    "stylers": [
                        { "hue": "#a1ff00" }
                    ]
                }
                ,
                //hide
                {
                    featureType: 'poi.business',
                    elementType: 'labels',
                    stylers: [
                        { 'visibility': 'off' }
                    ]
                }
            ]
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        prepareGeolocation();
        doGeolocation();
        //directions
        //directionsDisplay.setMap(map);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('panel'));
    }

    function doGeolocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(positionSuccess, positionError);
        } else {
            positionError(-1);
        }
    }

    function positionError(err) {
        var msg;
        switch(err.code) {
            case err.UNKNOWN_ERROR:
                msg = "Unable to find your location";
                break;
            case err.PERMISSION_DENINED:
                msg = "Permission denied in finding your location";
                break;
            case err.POSITION_UNAVAILABLE:
                msg = "Your location is currently unknown";
                break;
            case err.BREAK:
                msg = "Attempt to find location took too long";
                break;
            default:
                msg = "Location detection not supported in browser";
        }
        document.getElementById('info').innerHTML = msg;
    }

    function positionSuccess(position) {
        // Centre the map on the new location
        var coords = position.coords || position.coordinate || position;
        if(position.coords.latitude==6.9270786 && position.coords.longitude==79.861243){
            var latLng = new google.maps.LatLng(7.2940167594260,80.633624023437);
            direction_golbal_variable_latlon= new google.maps.LatLng(7.2940167594260,80.633624023437);
        }
        else{
            var latLng = new google.maps.LatLng(coords.latitude, coords.longitude);
            direction_golbal_variable_latlon= new google.maps.LatLng(coords.latitude, coords.longitude);}
        map.setCenter(latLng);
        map.setZoom(14);
        var cmarker = new google.maps.Marker({
            map: map,
            position: latLng,
            animation: google.maps.Animation.BOUNCE,
          //  icon:'./icons/walking-tour.png',
            icon:'{{ asset  ('/icons/walking-tour.png') }}',
            title: 'Your Current location'
        });

        cmarker.setMap(map);

        //ADD Marker
        <?php
        //@mysql_connect('localhost','root','') or die('Couldn\'t connect to the Database!');
        //@mysql_select_db('test') or die('Couldn\'t connect to the Database!');
        //  $query='SELECT * FROM `markers` WHERE `top_restaurants` = "'.$type.'" ';

        //insert




        //insert


        ?>

                  addMarker("{{ $data->lat }}","{{ $data->lon }}",map,"{{ $data->quick_overview }}","hh","d");
        <?php






                                                 function marker($la,$ln){
                                                     $q="SELECT * FROM `markers` WHERE `lat`=".$la." AND `lng`=".$ln." ";


                                                         if($query_run=mysql_query($q)){
                                                                                                     while($query_row=mysql_fetch_assoc($query_run)){
                                                                                                         $id=$query_row['id'];
                                                                                                         $name=$query_row['name'];
                                                                                                         $address=$query_row['address'];
                                                                                                         $lat=$query_row['lat'];
                                                                                                         $lng=$query_row['lng'];
                                                                                                         $type=$query_row['type'];
                                                                                                         $des=$query_row['Description'];
                                                                                                         $img=$query_row['imgpath'];
                                                                                                         $cont=$query_row['Contact'];
                                                                                                         $website=$query_row['website'];
                                                                                                         $website_url=$query_row['website_url'];


                                                                      $contentString ="<div id='iw-container'>"
                                                                     ."<div class='iw-title'>".$name."</div>"
                                                                     ."<div class='iw-content'>"
                                                                      ." <div class='iw-subTitle'>".$type."</div>"
                                                                     ."<img src='".$img ."' alt='Uluru Restaurant' style='width:150px;height:150px;'>"
                                                                      ." <p>".$des."</p>"
                                                                       ."<div class='iw-subTitle'>Contacts</div>"
                                                                       ."<p>".$cont."<a href='".$website_url."'>".$website."</a></p>"
                                                                     ."</div>"
                                                                     ."<div class='iw-bottom-gradient'></div>"
                                                                   ."</div>";

                                                                                                     }



                                                         }

                                                         return $contentString;



                                                 }


                                             ?>
      map.setCenter(latLng);





        document.getElementById('info').innerHTML = 'Looking for <b>' +
                coords.latitude + ', ' + coords.longitude + '</b>...';

        // And reverse geocode.
        (new google.maps.Geocoder()).geocode({latLng: latLng}, function(resp) {
            var place = "You're around here somewhere!";
            if (resp[0]) {
                var bits = [];
                for (var i = 0, I = resp[0].address_components.length; i < I; ++i) {
                    var component = resp[0].address_components[i];
                    if (contains(component.types, 'political')) {
                        bits.push('<b>' + component.long_name + '</b>');
                    }
                }
                if (bits.length) {
                    place = bits.join(' > ');
                }
                marker.setTitle(resp[0].formatted_address);
            }
            document.getElementById('info').innerHTML = place;
        });
    }

    function contains(array, item) {
        for (var i = 0, I = array.length; i < I; ++i) {
            if (array[i] == item) return true;
        }
        return false;
    }
    //load comments

    function load_commennts(comment_url_f){
        var str1 = comment_url_f;

        $("#commentsss").load(str1);
    }

    function addMarker(lat, lng, maps,con,comment_url,type) {

        var contentString=con;


        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lng),
            title: ' '+type+' ',
            icon:'{{ asset  ('/icons/bar.png') }}',
            animation: google.maps.Animation.DROP
        });

        marker.setMap(maps);

        google.maps.event.addListener(marker, 'click', function() {
            if (infowindow) infowindow.close();
            infowindow = new google.maps.InfoWindow({
                content: contentString
            });


            infowindow.open(maps,marker);
            calcRoute(lat,lng);
            load_commennts(comment_url);
        });

    }


    //directions
    function calcRoute(lat,lon) {
        var start = map.getCenter();
        //var start = document.getElementById('start').value;
        //var end = document.getElementById('end').value;
        var request = {


            origin:direction_golbal_variable_latlon,
            destination:new google.maps.LatLng(lat,lon),//7.2964Â° N, 80.6350
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
            else
            {alert(":(")}
        });
    }

    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
    }

    function clearWaypoints() {
        markers = [];
        origin = null;
        destination = null;
        waypoints = [];
        directionsVisible = false;
    }
    function reset() {
        clearMarkers();
        clearWaypoints();
        directionsDisplay.setMap(null);
        directionsDisplay.setPanel(null);
        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById("directionsPanel"));
    }


</script>
<script>
    jQuery( document ).ready(function( $ ) {

        //  $("#dialogmessage").show();
        $(function() {
            $( "#dialogmessage" ).dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });
//set
        $("#iid").hide();
        $("#rate1").hide();
        $rate=$("#rate1").val();
        if($rate==1) {
            $("#star-1").prop("checked", true);
        }
        if($rate==2) {
            $("#star-2").prop("checked", true);
        }
        if($rate==3) {
            $("#star-3").prop("checked", true);
        }
        if($rate==4) {
            $("#star-4").prop("checked", true);
        }
        if($rate==5) {
            $("#star-5").prop("checked", true);
        }

        $("#ratesubmit").click(function (){
            $vid=$("#iid").val();


            alert($val= $('input[name=star]:checked', '#ratingsForm').val());
            //    window.location="../app/rating_ajax/"++"";
            window.location="../app/rating_ajax/"+$val+"/"+$vid+"";

        });


    });
</script>
@section('content')
     @if(isset($data->rating))
    <input id="rate1" type="text"  value="{{ $data->rating }}">
    @else
         <input id="rate1" type="text"  value="{{ $finalrate }}">
         @endif
    <input id="iid" type="text"  value="{{ $data->id }}">
        <!--fb like :share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=750548591758451";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--fb like :share -->

<div class="container">
    <div class="col-md-9">
        <div class="col-md-5 grid">
            <div class="flexslider">
                <ul class="slides">
                    <li data-thumb="images/si.jpg">
                        <div class="thumb-image"> <img src={{ asset($data->image_path) }} data-imagezoom="true" class="img-responsive"> </div>
                    </li>RATE THIS PAINTING</br>

                    <form id="ratingsForm">
                        <div class="stars">
                            <input type="radio" name="star" class="star-1" id="star-1" value="1" />
                            <label class="star-1" for="star-1">1</label>
                            <input type="radio" name="star" class="star-2" id="star-2" value="2"/>
                            <label class="star-2" for="star-2">2</label>
                            <input type="radio" name="star" class="star-3" id="star-3" value="3" />
                            <label class="star-3" for="star-3">3</label>
                            <input type="radio" name="star" class="star-4" id="star-4" value="4" />
                            <label class="star-4" for="star-4">4</label>
                            <input type="radio" name="star" class="star-5" id="star-5" value="5" />
                            <label class="star-5" for="star-5">5</label>
                            <span></span>
                        </div>

                    </form>                </ul>

<?php if($data->id == $testproduct->ImageID && (Session::get('userid'))==$testproduct->UserID):  ?>

                <div id="ratesubmit">
                    <lable type="submit"  class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Rate
                    </lable>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-7 single-top-in">
            <div class="span_2_of_a1 simpleCart_shelfItem">
                <h3>{{ $data->title }}

                </h3>
                <div class="price_single">
                    <span class="reducedfrom item_price">{{ $data->cost }}</span>
                    <a href="#">click for offer</a>
                    <div class="clearfix"></div>
                </div>
                <h4 class="quick">Quick Overview:</h4>
                <p class="quick_desc"> {{ $data->quick_overview }}</p>
                <div class="wish-list">
                    <ul>
                        <li class="wish"><a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>Add to Wishlist</a></li>
                        <li class="compare"><a href="#"><span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span>Add to Compare</a></li>
                    </ul>
                </div>
                <div class="quantity">
                    <div class="quantity-select">
                        <div class="entry value-minus">&nbsp;</div>
                        <div class="entry value"><span>1</span></div>
                        <div class="entry value-plus active">&nbsp;</div>
                    </div>
                </div>
                <!--quantity-->
                <script>
                    $('.value-plus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                        if(newVal>=1) divUpd.text(newVal);
                    });
                </script>
                <!--quantity-->

                <a href="#" class="add-to item_add hvr-skew-backward">Add to cart</a>
                <div class="clearfix"> </div>
            </div>

        </div>
        <div class="clearfix"> </div>
        <!---->
        <div class="tab-head">
            <nav class="nav-sidebar">
                <ul class="nav tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">Additional Information</a></li>
                    <li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>
                </ul>
            </nav>
            <div class="tab-content one">
                <div class="tab-pane active text-style" id="tab1">
                    <div class="facts">
                        <p > {{ $data->producut_description }}</p>
                        <ul>
                        </ul>
                    </div>

                </div>
                <div class="tab-pane text-style" id="tab2">

                    <div class="facts">
                        <p > {{ $data->add_info }}</p>
                        <ul >
                        </ul>
                    </div>

                </div>
                <div class="tab-pane text-style" id="tab3">

                    <div class="facts">
                        <p >{{ $data->reviews }}</p>
                        <ul>

                        </ul>
                    </div>

                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <!---->
    </div>
    <!----->

    <div class="col-md-3 product-bottom product-at">
        <!--categories-->

        <!--initiate accordion-->
        <script type="text/javascript">
            $(function() {
                var menu_ul = $('.menu-drop > li > ul'),
                        menu_a  = $('.menu-drop > li > a');
                menu_ul.hide();
                menu_a.click(function(e) {
                    e.preventDefault();
                    if(!$(this).hasClass('active')) {
                        menu_a.removeClass('active');
                        menu_ul.filter(':visible').slideUp('normal');
                        $(this).addClass('active').next().stop(true,true).slideDown('normal');
                    } else {
                        $(this).removeClass('active');
                        $(this).next().stop(true,true).slideUp('normal');
                    }
                });

            });
        </script>
        <!--//menu-->


        <!---->

            </div>
    <div class="clearfix"> </div>
</div>
</div>
<!--brand-->

<!--//brand-->
</div>

</div>

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<!--like -->
<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="10" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
<!--shre-->


     <section id="main" class="container">
         <header>
         </header>
         <div class="box">
             <p><div id="info" class="lightbox" >Detecting your location...</div></p>
             <span class="image featured"><div id="map_canvas"></div></span>
             <h3>DIRECTIONS</h3>
             <p><div id="panel" style="position:relative;left:15%;width:70%; height:75%; overflow: auto;"></div> </p>


         </div>
     </section>
@stop

