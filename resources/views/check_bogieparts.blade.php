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
  <script src="{{ URL::asset('/js/function.js') }}"></script>
  
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
            <li><a href='/'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li class="active"><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
              </ul>
            </li>
            <li><a href='/trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='/car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='/part_management'>จัดการอะไหล่</a></li>            
            <li><a href='/depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
  <div class="content">

  <!--First Container-->
    <!-- Train Image -->
    <div class="bg-6 contain-carpart">
      <p class="title-carpart">เลือกตรวจสภาพอะไหล่</p>
      <p id="desc" class="detail-bogie">&nbsp;</p>
      <p id="chkbopart" class="detail-loco">&nbsp;</p>

      <!-- Display Locomative Part -->
      <div style="overflow-x: scroll;">
      <ol id='a0' style="color:red">
      </ol>
      <ol id='a1' style="color:orange">
      </ol>
        <!-- Image Locomative -->
        <img src="/image/pic/bo_detail2.png" usemap = "#bogiedetail">

        <!-- bogie coords -->
        <map name="bogiedetail">
          <area shape="rect" coords="233,425,352,455" href="/check_parts/{{$mid}}/{{$id}}/bogies" onmouseover="writeText('Bogies')" onmouseout="writeText('&nbsp;')" alt="Bogies">
          <area shape="rect" coords="273,479,392,509" href="/check_parts/{{$mid}}/{{$id}}/battery" onmouseover="writeText('Battery')" onmouseout="writeText('&nbsp;')" alt="Battery">
          <area shape="rect" coords="405,523,552,552" href="/check_parts/{{$mid}}/{{$id}}/steam_vapor_traps" onmouseover="writeText('Steam Vapor Traps')" onmouseout="writeText('&nbsp;')" alt="Steam Vapor Traps">
          <area shape="rect" coords="540,460,658,489" href="/check_parts/{{$mid}}/{{$id}}/brake_set" onmouseover="writeText('Brake Set')" onmouseout="writeText('&nbsp;')" alt="Brake Set">
          <area shape="rect" coords="685,461,803,490" href="/check_parts/{{$mid}}/{{$id}}/wheels" onmouseover="writeText('Wheels')" onmouseout="writeText('&nbsp;')" alt="Wheels">
          <area shape="rect" coords="756,410,874,439" href="/check_parts/{{$mid}}/{{$id}}/steel_step" onmouseover="writeText('Steel Step')" onmouseout="writeText('&nbsp;')" alt="Steel Step">
          <area shape="rect" coords="685,511,873,540" href="/check_parts/{{$mid}}/{{$id}}/steam_end_connection" onmouseover="writeText('Steam End Connection')" onmouseout="writeText('&nbsp;')" alt="Steam End Connection">
          <area shape="rect" coords="656,107,845,136" href="/check_parts/{{$mid}}/{{$id}}/safty_tail_gates" onmouseover="writeText('Safty Tail Gates')" onmouseout="writeText('&nbsp;')" alt="Safty Tail Gates">
          <area shape="rect" coords="580,50,698,79" href="/check_parts/{{$mid}}/{{$id}}/roof" onmouseover="writeText('Roof')" onmouseout="writeText('&nbsp;')" alt="Roof">
          <area shape="rect" coords="481,100,599,130" href="/check_parts/{{$mid}}/{{$id}}/windows" onmouseover="writeText('Windows')" onmouseout="writeText('&nbsp;')" alt="Windows">
          <area shape="rect" coords="303,67,421,96" href="/check_parts/{{$mid}}/{{$id}}/tumblehome" onmouseover="writeText('Tumblehome')" onmouseout="writeText('&nbsp;')" alt="Tumblehome">
          <area shape="rect" coords="142,133,260,162" href="/check_parts/{{$mid}}/{{$id}}/doors" onmouseover="writeText('Doors')" onmouseout="writeText('&nbsp;')" alt="Doors">
        </map>
      </div>
    </div>
  </div>
   @foreach($part_bo as $bo)
   @foreach($part_alert as $a0)
   
   <script type="text/javascript">
   var part = "{{$bo->part_type}}";
   var part_id = parseInt("{{$bo->id}}")-43;
   var part_alert = "{{$a0}}";
   // console.log(part_id);
   // console.log(part_id);
   if(part == part_alert){
     document.getElementById("a0").append(part_id+"."+" "+part+"  !!! ");
   }
   
  </script> 
   @endforeach

   @foreach($part_alert1 as $a1)
   <script type="text/javascript">
   var part = "{{$bo->part_type}}";
   var part_id = parseInt("{{$bo->id}}")-43;
   var part_alert1 = "{{$a1}}";
   if(part == part_alert1){
    document.getElementById("a1").append(part_id+"."+" "+part+"  !! ");
   }
   
  </script> 
   @endforeach  
  @endforeach

  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>
  
</body>
</html>