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
  <p id="desc" style="text-align: center; font-weight: bold; margin-top: 10px; font-size: 20px;">ตรวจสภาพอะไหล่</p>
  <div style="overflow-y: hidden; overflow-x: scroll; margin-left: 3%; margin-right: 3%; background-color: #131617;">
      <img src="image/pic/loco_detail1.png" usemap = "#locodetail">
      <map name="locodetail">
        <area shape="rect" coords="83,437,248,464" href="#SteamEndConnection" onmouseover="writeText('Steam End Connection')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="SteamEndConnection">
        <area shape="rect" coords="210,510,346,537" href="#Batteries" onmouseover="writeText('Batteries')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Batteries">
        <area shape="rect" coords="286,420,398,448" href="#Wheels" onmouseover="writeText('Wheels')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Wheels">
        <area shape="rect" coords="346,463,481,490" href="#Trucks" onmouseover="writeText('Trucks')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Trucks">
        <area shape="rect" coords="350,509,486,537" href="#GroundLight" onmouseover="writeText('Ground Light')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Ground Light">
        <area shape="rect" coords="494,508,630,536" href="#MainAirServoir" onmouseover="writeText('Main Air Servoir')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Main Air Servoir">
        <area shape="rect" coords="522,417,663,444" href="#TractionMotorBlower" onmouseover="writeText('Traction Motor Blower')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Traction Motor Blower">
        <area shape="rect" coords="522,449,663,475" href="#GeneratorBlower" onmouseover="writeText('Generator Blower')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Generator Blower">
        <area shape="rect" coords="522,478,663,505" href="#AuxiliaryGenerator" onmouseover="writeText('Auxiliary Generator')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Auxiliary Generator">
        <area shape="rect" coords="614,546,800,574" href="#MainGenerator&Alternator" onmouseover="writeText('Main Generator &amp; Alternator')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Main Generator &amp; Alternator">
        <area shape="rect" coords="815,546,1016,574" href="#FilterSteamGeneratorWaterTank" onmouseover="writeText('Filter - Steam Generator Water Tank')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Filter - Steam Generator Water Tank">
        <area shape="rect" coords="716,503,868,531" href="#WaterTank" onmouseover="writeText('Water Tank')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Water Tank">
        <area shape="rect" coords="725,471,868,499" href="#GaugeFuelTank" onmouseover="writeText('Gauge - Fuel Tank')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Gauge - Fuel Tank">
        <area shape="rect" coords="732,439,868,468" href="#FilterFuel" onmouseover="writeText('Filter - Fuel')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Filter - Fuel">
        <area shape="rect" coords="732,407,868,435" href="#FuelTank" onmouseover="writeText('Fuel Tank')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Fuel Tank">
        <area shape="rect" coords="1028,546,1216,574" href="#EmergencyFuelCutoff" onmouseover="writeText('Emergency Fuel Cutoff')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Emergency Fuel Cutoff">
        <area shape="rect" coords="890,496,1044,524" href="#SoakBackPump" onmouseover="writeText('SoakBackPump')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="SoakBackPump">
        <area shape="rect" coords="898,464,1044,493" href="#LubeOilFilter&Strainer" onmouseover="writeText('Lube Oil Filter &amp; Strainer')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Lube Oil Filter &amp; Strainer">
        <area shape="rect" coords="905,433,1044,461" href="#FuelSuctionStrainer" onmouseover="writeText('Fuel Suction Strainer')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Fuel Suction Strainer">
        <area shape="rect" coords="905,402,1044,430" href="#FuelPump" onmouseover="writeText('Fuel Pump')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Fuel Pump">
        <area shape="rect" coords="1056,496,1196,524" href="#LubeOilFilter" onmouseover="writeText('Lube Oil Filter')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Lube Oil Filter" alt="Lube Oil Filter">
        <area shape="rect" coords="1061,464,1241,492" href="#WaterCooledAirCompressor" onmouseover="writeText('Water Cooled Air Compressor')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Water Cooled Air Compressor">
        <area shape="rect" coords="1070,430,1241,459" href="#2ndElectricalContralCabinet" onmouseover="writeText('2nd Electrical Contral Cabinet')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd Electrical Contral Cabinet">

        <area shape="rect" coords="1080,103,1228,131" href="#SandBox" onmouseover="writeText('Sand Box')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Sand Box">
        <area shape="rect" coords="1080,65,1228,93" href="#48Fan&Moter" onmouseover="writeText('48&quot; Fan &amp; Moter')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="48&quot; Fan &amp; Moter">
        <area shape="rect" coords="1080,32,1228,60" href="#Radiator" onmouseover="writeText('Radiator')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Radiator">
        <area shape="rect" coords="895,127,1044,155" href="#CoolingHatch" onmouseover="writeText('Cooling Hatch')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Cooling Hatch">
        <area shape="rect" coords="895,89,1044,117" href="#EngineWaterTank" onmouseover="writeText('Engine Water Tank')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Engine Water Tank">
        <area shape="rect" coords="895,52,1044,80" href="#LubeOilCooler" onmouseover="writeText('Lube Oil Cooler')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Lube Oil Cooler">
        <area shape="rect" coords="619,28,767,56" href="#36Fan&Moter" onmouseover="writeText('36&quot; Fan &amp; Moter')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="36&quot; Fan &amp; Moter">
        <area shape="rect" coords="621,147,769,175" href="#EngineTurbocharger" onmouseover="writeText('Engine Turbo charger')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Engine Turbo charger">
        <area shape="rect" coords="621,111,769,139" href="#TurboIntercooler" onmouseover="writeText('Turbo Intercooler')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Turbo Intercooler">
        <area shape="rect" coords="621,69,769,97" href="#TurboAirIntel&Silencer" onmouseover="writeText('Turbo Air Intel &amp; Silencer')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Turbo Air Intel &amp; Silencer">
        <area shape="rect" coords="506,146,567,173" href="#Horn" onmouseover="writeText('Horn')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Horn">
        <area shape="rect" coords="426,103,592,131" href="#1stElectricalContralCabinet" onmouseover="writeText('1st Electrical Contral Cabinet')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st Electrical Contral Cabinet">
        <area shape="rect" coords="414,62,601,90" href="#EngineControl&InstrumentPanel" onmouseover="writeText('Engine Control &amp; Instrument Panel')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Engine Control &amp; Instrument Panel">
        <area shape="rect" coords="192,30,327,58" href="#ControlStand" onmouseover="writeText('Control Stand')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Control Stand">
        <area shape="rect" coords="191,68,327,96" href="#SpeedRecorder" onmouseover="writeText('Speed Recorder')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Speed Recorder">
        <area shape="rect" coords="35,96,170,124" href="#CabHatch" onmouseover="writeText('Cab Hatch')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Cab Hatch">
        <area shape="rect" coords="34,139,170,168" href="#Hatch" onmouseover="writeText('Hatch')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Hatch">
        <area shape="rect" coords="32,198,168,226" href="#Headlight" onmouseover="writeText('Headlight')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Headlight">
        <area shape="rect" coords="32,240,168,268" href="#SteamGenerator" onmouseover="writeText('Steam Generator')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Steam Generator">
        <area shape="rect" coords="118,309,253,337" href="#WaterTreatment" onmouseover="writeText('Water Treatment')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="Water Treatment">
      </map>
  </div>

 
   <!--  <p id="desc">rytet</p> -->
    <br><br>
  
      
      <script>
        function writeText(txt) {
        document.getElementById("desc").innerHTML = txt;
        }

      </script>
  
  <!--Footer-->
</body>
</html>