<!DOCTYPE html>
<html>
    <head>
        <title>Page Not Found.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: white;
                display: table;
                font-weight: bold;
                font-family: 'Lato';
                background-color: #B00000;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            .btn{
                border-radius: 24px;
                background-color: transparent;
                border-color: white;
                color: white;
            }
            .btn:hover{
                background-color: white;
                border-color: white;
                color: #B00000;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-2 col-xs-2 col-lg-4">  
                </div>
                <div class="col-md-4 col-sm-8 col-xs-8 col-lg-4">  
                    <div class="login-logo">
                        <a href="{{url('/')}}"><img src="{{asset('images/logo2.png')}}" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-2 col-xs-2 col-lg-4">  
                </div>
            </div>
            <div class="content">
                <div class="title">Sorry.. Something went wrong</div>
            </div>
            <br>
            <a class="btn" href="{{url('/')}}"><i class="fa fa-chevron-circle-left"></i> <b>Go Back to main page</b></a>
        </div>
    </body>
</html>