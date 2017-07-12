<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo1.png">
    <title>Telkom CorpU News Center</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/shortcodes.css" rel="stylesheet">
    <link href="/css/style-wp.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <!-- only for demo -->
    <link href="/css/demo-settings.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="boxed active">

    <!-- end topbar -->
    <!-- header (logo section) -->
    {{--<header class="header">--}}
        {{--<div class="container">--}}
            {{--<div class="logo"><a href="index.html"><img id="logo" src="images/logo2.png" alt="logo"></a></div>--}}
            {{--<!-- <h1>Haute Couture</h1>--}}
                {{--<div class="description">black is new red</div> -->--}}
            {{--<div class="ad-728x90"><a href="index.html"><img width="300" src="images/maung.jpeg" alt="ad728x90"></a></div>--}}
            {{--<div class="ad-728x90"><a href="index.html"><img width="350" src="images/slide1.png" alt="ad728x90"></a></div>--}}
        {{--</div>--}}
    {{--</header>--}}

    {{--<header class="header">--}}
        {{--<div class="container" style="width: 500px; display: block; margin-left: auto; margin-right: auto">--}}
            {{--<div class="logo"><a href="index.html"><img id="logo" src="/images/logo2.png" alt="logo"></a></div>--}}

                {{--<div class="description">black is new red</div>--}}
            {{--<div class="ad-728x90"><a href="/index"><img src="/images/ad728x90.png" alt="ad728x90"></a></div>--}}
        {{--</div>--}}
    {{--</header>--}}
    <!-- end header (logo section) -->
    <!-- main menu -->
    <nav class="main-menu">
        <div class="container">
            <label for="show-menu" class="show-menu"><i class="fa fa-bars"></i></label>
            <input type="checkbox" id="show-menu">

            <ul class="menu" id="main-mobile-menu">
                <li>
                    <img width="150" id="logo" src="images/logo2.png" alt="logo">
                </li>
                <li>
                    <a href="/index"><i class="fa fa-home"></i> Home </a><span class="sub_menu_toggle"></span>
                </li>
                <li>
                    <a href="/contact"><i class="fa fa-phone"></i> Contact Us </a><span class="sub_menu_toggle"></span>
                </li>
                <li class="search-menu">
                    <a href="#">Log In <i class="fa fa-user"></i></a><span class="sub_menu_toggle"></span>
                </li>
                <li class="search-menu">
                    <a href="#"><i class="fa fa-search"></i></a><span class="sub_menu_toggle"></span>
                    <ul class="sub-menu">
                        <li>
                            <form id="search" class="navbar-form search" action="">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Type to search" name="s" id="s">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-default btn-submit"><i class="fa fa-angle-right"></i></button></span>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>



@yield('content')

<!-- end Instagram Widget Section -->
    <footer class="footer">
        <div class="footer-bottom">
            <i class="fa fa-copyright"></i>Copyright 2017. PT. Telekomunikasi Indonesia, Tbk.<br/>
            {{--<a href="http://www.orange-themes.com/">Happy Trip Korea</a>--}}
        </div>
    </footer>
</div>
<!-- boxed -->
<!-- Bootstrap core and theme JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/demo-settings.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="/js/themescripts.js"></script>
</body>
</html>