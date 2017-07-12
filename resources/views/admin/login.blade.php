<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Telkom CorpU News Center | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/tcu.css')}}" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition login-page" id="body-login">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('login')}}"><img src="{{asset('images/logo2.png')}}" class="img-responsive"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Masuk sebagai peserta</p> -->

    <form action="/home_admin" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Sign in</button>
      </div><!-- /.box-footer -->
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<!-- <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- iCheck -->

<script type="text/javascript" src="{{asset('js/sweetalert2.js')}}"></script>
</body>
</html>
