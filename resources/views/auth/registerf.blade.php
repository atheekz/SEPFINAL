<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE HTML>
<html>
<head>
    <title>Paint Pal</title>
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="../js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="../application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
    <!-- webfonts -->
</head>
<body>
<!-- container -->
<!-- header -->
<div class="header">
    <!-- top-header -->
    <div class="top-header">
        <div class="container">
            <div class="rigister-info">
                <ul>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">SignUp</a></li>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- /top-header -->
    <!-- bottom-header -->
    <div class="bottom-header">
        <div class="container">
            <div class="bottom-header-left">
                <p>The Finest Genuine Leather meet with Ingenious  Craftsmen Shoes </p>
            </div>
            <div class="logo">
                <a href="index.html"><img src="../images/logo.png" title="gaia" /></a>
            </div>
            <div class="bottom-header-right">
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">Checkout</a></li>
                </ul>
                <div class="search-cart">
                    <div class="search-box">
                        <form>
                            <input type="text" placeholder="Search..." />
                            <input type="submit" value="" />
                        </form>
                    </div>
                    <div class="cart-box">
                        <select>
                            <option> 02 Items</option>
                            <option> 03 Items</option>
                            <option> 04 Items</option>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bottom-header -->
</div>


<center>
<form method="POST" action="register">
    {!! csrf_field() !!}

    <div>
        Name
        <input class="btn-5" type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Email
        <input class="btn-5" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input class="btn-5" type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input class="btn-5" type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>


    </center>