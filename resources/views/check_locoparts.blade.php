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
      <p id="desc" class="detail-loco">&nbsp;</p>
      <p id="chklocpart" class="detail-loco">&nbsp;</p>

      <!-- Display Locomative Part -->
      <div style="overflow-x: scroll;">
        <!-- Image Locomative -->
        <img id="theImg" src="/image/pic/loco_detail2.png" usemap = "#locodetail">

        <!-- loco coords -->
        <map name="locodetail">
          <area shape="rect" coords="83,437,248,464" href="/check_parts/{{$mid}}/{{$id}}/steam_end_connection" onmouseover="writeText('Steam End Connection')" onmouseout="writeText('&nbsp;')" alt="SteamEndConnection">
          <area shape="rect" coords="210,510,346,537" href="/check_parts/{{$mid}}/{{$id}}/battery" onmouseover="writeText('Battery')" onmouseout="writeText('&nbsp;')" alt="Battery">
          <area shape="rect" coords="286,420,398,448" href="/check_parts/{{$mid}}/{{$id}}/wheels" onmouseover="writeText('Wheels')" onmouseout="writeText('&nbsp;')" alt="Wheels">
          <area shape="rect" coords="346,463,481,490" href="/check_parts/{{$mid}}/{{$id}}/trucks" onmouseover="writeText('Trucks')" onmouseout="writeText('&nbsp;')" alt="Trucks">
          <area shape="rect" coords="350,509,486,537" href="/check_parts/{{$mid}}/{{$id}}/ground_light" onmouseover="writeText('Ground Light')" onmouseout="writeText('&nbsp;')" alt="Ground Light">
          <area shape="rect" coords="494,508,630,536" href="/check_parts/{{$mid}}/{{$id}}/main_air_servoir" onmouseover="writeText('Main Air Servoir')" onmouseout="writeText('&nbsp;')" alt="Main Air Servoir">
          <area shape="rect" coords="522,417,663,444" href="/check_parts/{{$mid}}/{{$id}}/traction_motor_blower" onmouseover="writeText('Traction Motor Blower')" onmouseout="writeText('&nbsp;')" alt="Traction Motor Blower">
          <area shape="rect" coords="522,449,663,475" href="/check_parts/{{$mid}}/{{$id}}/generator_blower" onmouseover="writeText('Generator Blower')" onmouseout="writeText('&nbsp;')" alt="Generator Blower">
          <area shape="rect" coords="522,478,663,505" href="/check_parts/{{$mid}}/{{$id}}/auxiliary_generator" onmouseover="writeText('Auxiliary Generator')" onmouseout="writeText('&nbsp;')" alt="Auxiliary Generator">
          <area shape="rect" coords="614,546,800,574" href="/check_parts/{{$mid}}/{{$id}}/main_generator" onmouseover="writeText('Main Generator &amp; Alternator')" onmouseout="writeText('&nbsp;')" alt="Main Generator &amp; Alternator">
          <area shape="rect" coords="815,546,1016,574" href="/check_parts/{{$mid}}/{{$id}}/filter_steam_generator_water_tank" onmouseover="writeText('Filter - Steam Generator Water Tank')" onmouseout="writeText('&nbsp;')" alt="Filter - Steam Generator Water Tank">
          <area shape="rect" coords="716,503,868,531" href="/check_parts/{{$mid}}/{{$id}}/water_tank" onmouseover="writeText('Water Tank')" onmouseout="writeText('&nbsp;')" alt="Water Tank">
          <area shape="rect" coords="725,471,868,499" href="/check_parts/{{$mid}}/{{$id}}/gauge_fuel_tank" onmouseover="writeText('Gauge - Fuel Tank')" onmouseout="writeText('('&nbsp;')" alt="Gauge - Fuel Tank">
          <area shape="rect" coords="732,439,868,468" href="/check_parts/{{$mid}}/{{$id}}/filter_fuel" onmouseover="writeText('Filter - Fuel')" onmouseout="writeText('&nbsp;')" alt="Filter - Fuel">
          <area shape="rect" coords="732,407,868,435" href="/check_parts/{{$mid}}/{{$id}}/fuel_tank" onmouseover="writeText('Fuel Tank')" onmouseout="writeText('&nbsp;')" alt="Fuel Tank">
          <area shape="rect" coords="1028,546,1216,574" href="/check_parts/{{$mid}}/{{$id}}/emergency_fuel_cut_off" onmouseover="writeText('Emergency Fuel Cutoff')" onmouseout="writeText('&nbsp;')" alt="Emergency Fuel Cutoff">
          <area shape="rect" coords="890,496,1044,524" href="/check_parts/{{$mid}}/{{$id}}/soak_back_pump" onmouseover="writeText('SoakBackPump')" onmouseout="writeText('&nbsp;')" alt="SoakBackPump">
          <area shape="rect" coords="898,464,1044,493" href="/check_parts/{{$mid}}/{{$id}}/lube_oil_filter" onmouseover="writeText('Lube Oil Filter &amp; Strainer')" onmouseout="writeText('&nbsp;')" alt="Lube Oil Filter &amp; Strainer">
          <area shape="rect" coords="905,433,1044,461" href="/check_parts/{{$mid}}/{{$id}}/fuel_suction_strainer" onmouseover="writeText('Fuel Suction Strainer')" onmouseout="writeText('&nbsp;')" alt="Fuel Suction Strainer">
          <area shape="rect" coords="905,402,1044,430" href="/check_parts/{{$mid}}/{{$id}}/fuel_pump" onmouseover="writeText('Fuel Pump')" onmouseout="writeText('&nbsp;')" alt="Fuel Pump">
          <area shape="rect" coords="1056,496,1196,524" href="/check_parts/{{$mid}}/{{$id}}/lube_oil_filter1" onmouseover="writeText('Lube Oil Filter')" onmouseout="writeText('&nbsp;')" alt="Lube Oil Filter" alt="Lube Oil Filter">
          <area shape="rect" coords="1061,464,1241,492" href="/check_parts/{{$mid}}/{{$id}}/water_cooled_air_compressor" onmouseover="writeText('Water Cooled Air Compressor')" onmouseout="writeText('&nbsp;')" alt="Water Cooled Air Compressor">
          <area shape="rect" coords="1070,430,1241,459" href="/check_parts/{{$mid}}/{{$id}}/2nd_electrical_contral_cabinet" onmouseover="writeText('2nd Electrical Contral Cabinet')" onmouseout="writeText('&nbsp;')" alt="2nd Electrical Contral Cabinet">

          <area shape="rect" coords="1080,103,1228,131" href="/check_parts/{{$mid}}/{{$id}}/sand_box" onmouseover="writeText('Sand Box')" onmouseout="writeText('&nbsp;')" alt="Sand Box">
          <area shape="rect" coords="1080,65,1228,93" href="/check_parts/{{$mid}}/{{$id}}/fan_moter" onmouseover="writeText('48&quot; Fan &amp; Moter')" onmouseout="writeText('&nbsp;')" alt="48&quot; Fan &amp; Moter">
          <area shape="rect" coords="1080,32,1228,60" href="/check_parts/{{$mid}}/{{$id}}/radiator" onmouseover="writeText('Radiator')" onmouseout="writeText('&nbsp;')" alt="Radiator">
          <area shape="rect" coords="895,127,1044,155" href="/check_parts/{{$mid}}/{{$id}}/cooling_hatch" onmouseover="writeText('Cooling Hatch')" onmouseout="writeText('&nbsp;')" alt="Cooling Hatch">
          <area shape="rect" coords="895,89,1044,117" href="/check_parts/{{$mid}}/{{$id}}/engine_water_tank" onmouseover="writeText('Engine Water Tank')" onmouseout="writeText('&nbsp;')" alt="Engine Water Tank">
          <area shape="rect" coords="895,52,1044,80" href="/check_parts/{{$mid}}/{{$id}}/lube_oil_cooler" onmouseover="writeText('Lube Oil Cooler')" onmouseout="writeText('&nbsp;')" alt="Lube Oil Cooler">
          <area shape="rect" coords="619,28,767,56" href="/check_parts/{{$mid}}/{{$id}}/fan_moter1" onmouseover="writeText('36&quot; Fan &amp; Moter')" onmouseout="writeText('&nbsp;')" alt="36&quot; Fan &amp; Moter">
          <area shape="rect" coords="621,147,769,175" href="/check_parts/{{$mid}}/{{$id}}/engine_turbo_charger" onmouseover="writeText('Engine Turbocharger')" onmouseout="writeText('&nbsp;')" alt="Engine Turbo charger">
          <area shape="rect" coords="621,111,769,139" href="/check_parts/{{$mid}}/{{$id}}/turbo_intercooler" onmouseover="writeText('Turbo Intercooler')" onmouseout="writeText('&nbsp;')" alt="Turbo Intercooler">
          <area shape="rect" coords="621,69,769,97" href="/check_parts/{{$mid}}/{{$id}}/turbo_air_intel" onmouseover="writeText('Turbo Air Intel &amp; Silencer')" onmouseout="writeText('&nbsp;')" alt="Turbo Air Intel &amp; Silencer">
          <area shape="rect" coords="506,146,567,173" href="/check_parts/{{$mid}}/{{$id}}/horn" onmouseover="writeText('Horn')" onmouseout="writeText('&nbsp;')" alt="Horn">
          <area shape="rect" coords="426,103,592,131" href="/check_parts/{{$mid}}/{{$id}}/1st_electrical_contral_cabinet" onmouseover="writeText('1st Electrical Contral Cabinet')" onmouseout="writeText('&nbsp;')" alt="1st Electrical Contral Cabinet">
          <area shape="rect" coords="414,62,601,90" href="/check_parts/{{$mid}}/{{$id}}/engine_control" onmouseover="writeText('Engine Control &amp; Instrument Panel')" onmouseout="writeText('&nbsp;')" alt="Engine Control &amp; Instrument Panel">
          <area shape="rect" coords="192,30,327,58" href="/check_parts/{{$mid}}/{{$id}}/control_stand" onmouseover="writeText('Control Stand')" onmouseout="writeText('&nbsp;')" alt="Control Stand">
          <area shape="rect" coords="191,68,327,96" href="/check_parts/{{$mid}}/{{$id}}/speed_recorder" onmouseover="writeText('Speed Recorder')" onmouseout="writeText('&nbsp;')" alt="Speed Recorder">
          <area shape="rect" coords="35,96,170,124" href="/check_parts/{{$mid}}/{{$id}}/cab_hatch" onmouseover="writeText('Cab Hatch')" onmouseout="writeText('&nbsp;')" alt="Cab Hatch">
          <area shape="rect" coords="34,139,170,168" href="/check_parts/{{$mid}}/{{$id}}/hatch" onmouseover="writeText('Hatch')" onmouseout="writeText('&nbsp;')" alt="Hatch">
          <area shape="rect" coords="32,198,168,226" href="/check_parts/{{$mid}}/{{$id}}/headlight" onmouseover="writeText('Headlight')" onmouseout="writeText('&nbsp;')" alt="Headlight">
          <area shape="rect" coords="32,240,168,268" href="/check_parts/{{$mid}}/{{$id}}/steam_generator" onmouseover="writeText('Steam Generator')" onmouseout="writeText('&nbsp;')" alt="Steam Generator">
          <area shape="rect" coords="118,309,253,337" href="/check_parts/{{$mid}}/{{$id}}/water_treatment" onmouseover="writeText('Water Treatment')" onmouseout="writeText('&nbsp;')" alt="Water Treatment">
        </map>
        </canvas>

        <!-- Alert Part -->
        <!-- 1Part: Steam End Connection -->
        <!-- <div style="position: absolute; left: 122px; top: 710px;" id="Steam End Connection">
          <svg height="40" width="40">
          <circle cx="15" cy="15" r="12" stroke="red" stroke-width="2" fill="#131617" />
          <text x="12" y="21" fill="red" style="font-size:20px; font-weight: bolder;">&#33;</text>
          </svg>
        </div> -->

        <!-- 2Part: Battery -->
        <!-- <div style="position: absolute;" id="Battery" transform='translate(250 680)'>
          <svg height="40" width="40">
          <circle cx="15" cy="15" r="12" stroke="red" stroke-width="2" fill="#131617" />
          <text x="12" y="21" fill="red" style="font-size:20px; font-weight: bolder;">&#33;</text>
          </svg>
        </div> -->

      </div>
    </div>
  </div>

  <!-- <canvas id='myCanvas' width='1269px' height='617px'>

  <script>
    var img = document.getElementById("theImg");
    var cnvs = document.getElementById("myCanvas");
  
    cnvs.style.position = "absolute";
    cnvs.style.left = img.offsetLeft + "px";
    cnvs.style.top = img.offsetTop + "px";
  
  
    //Steam End Connection
    var ctx = cnvs.getContext("2d");
    ctx.beginPath();
    ctx.arc(93, 450, 12, 0, 2 * Math.PI, false);
    ctx.lineWidth = 4;
    ctx.fillStyle = "#131617";
    ctx.strokeStyle = 'red';
    ctx.stroke();
    ctx.fill();
    ctx.fillStyle = "red";
    ctx.textAlign = "center";
    ctx.font = "20px Arial";
    ctx.fillText("!",93, 457);
  </script> -->
 
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>
  
</body>
</html>