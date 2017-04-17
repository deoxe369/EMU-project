<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMU Utilization System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- CSS -->
  <link href="{{ URL::asset('/css/bootstrap.css') }}" rel="stylesheet" >
  <link href="{{ URL::asset('/css/bootstrap-responsive.css') }}" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css?family=Trirong:400" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/form.css') }}">
  

  <!-- Font -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/Quarklight/font.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/SansationLight/font.css') }}">

  <!-- Javascript -->
  <script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ URL::asset('/js/bootstrap.min.js') }} "></script>
  <script src="{{ URL::asset('/js/function.js') }}"></script></script>
  
</head>

<body data-spy="scroll">

  <!--Header-->
    <!-- Navbar -->
     <nav class="navbar navbar-default">
      <div class="container-fluid2">
        <!-- Brand and toggle get grouped for better mobile display-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only"> Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                          
          </button>
          <a class="navbar-brand" href='../'><p class="nav-brand">EMU Utilization System</p></a>
        </div>

        <!-- Collect the nav links,forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li class="active"><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
              </ul>
            </li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='../part_management'>จัดการอะไหล่</a></li>            
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->

  <!--First Container-->
  <div class="bg-6 contain-carpart">
    <!-- Topic -->
    <p class="title-carpart">เลือกตรวจสภาพตู้รถไฟ</p>

    <!-- Carousel: Slider Car Image -->
      <div id="carCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carCarousel" data-slide-to="0" class="active"></li>          
          <li data-target="#carCarousel" data-slide-to="1"></li>
          <li data-target="#carCarousel" data-slide-to="2"></li>
          <li data-target="#carCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          
          <!-- Image: Locomative -->
          <div class="item active">
            <a href="/check_parts/{{$id}}/{{$cars_loco[0]->id}}">
              <p class="detail-loco1">Locomative </p>
               <p class="detail-loco1"> Cars number {{$cars_loco[0]->id}}</p>
              <img src="/image/pic/4.png" alt="Locomative" width="80%" height="80%" style="margin: auto;">
            </a>
          </div>

          <!-- Image: Bogie -->
          @foreach($cars_bogie as $index => $bogie)
          <div class="item">
            <a href="/check_parts/{{$id}}/{{$bogie->id}}">
              <p class="detail-bogie"> Bogie{{$index+1}}</p>
              <p class="detail-loco1"> Cars number {{$bogie->id}}</p>
              <img src="/image/pic/2.png" alt="Bogie" width="80%" height="80%" style="margin: auto;">
            </a>
          </div>
          @endforeach

        </div>

        <!-- Left and right controls -->
        <a href="#carCarousel" class="left carousel-control" role="button" data-slide="prev">
          <span class="glyphicon icon-slide" aria-hidden="true"><img src="/image/icon/arrow-left-wht.png" class="icon-car-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a href="#carCarousel" class="right carousel-control" role="button" data-slide="next">
          <span class="glyphicon icon-slide" aria-hidden="true"><img src="/image/icon/arrow-right-wht.png" class="icon-car-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>

  <!--Footer-->
  <footer class="bg-2">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>
  
</body>
</html>