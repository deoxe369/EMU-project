<html>
    <head>@yield('title')
      <title>EMU Utilization System</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="{{ URL::asset('/css/bootstrap.css') }}" rel="stylesheet" >
      <link href="{{ URL::asset('/css/bootstrap-responsive.css') }}" rel="stylesheet" >
      <link href="https://fonts.googleapis.com/css?family=Trirong:400" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/theme.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/form.css') }}">
      <script src="js/jquery-3.1.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript"></script>
    </head>
   
    <body> @yield('menu')   
    <nav class="navbar navbar-default">
     <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href='../'>EMU Utilization System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ</a></li>
            <li><a href='../maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='../part_management'>จัดการอะไหล่</a></li>
            <li class="active"><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>
    </body>
</html>