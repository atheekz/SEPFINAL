<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 3/12/2016
 * Time: 2:14 PM
 */?>

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
            icon:'./icons/walking-tour.png',
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

                 <!--           addMarker("{{ $data->lat }}","{{ $data->log }}",map,"{{ $data->content }}","hh","d");-->
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
            icon:'./icons/'+type+'.png',
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




    });
</script>
@section('content')


    <div class="container">


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
@stop

