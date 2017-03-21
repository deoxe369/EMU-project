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
  <script src="{{ URL::asset('/js/jquery.slimscroll.js') }}"></script>
  
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
  
    <!-- Text Title Check -->
    <!-- <p id="desc" style="text-align: center; font-weight: bold; margin-top: 10px; font-size: 26px; color: #ff6f00;">ตรวจสภาพอะไหล่</p> -->
    <div class="div-tchkparts">
      <p id="desc" class="title-chkparts">ตรวจสภาพอะไหล่</p>
    </div>
  
    <!-- Train Image -->
    <div class="div-imgparts">
      
      <div id="scollhorz">
      <script type="text/javascript">
        $('#scollhorz').slimScroll({ color:'#ffab00', axis: 'x', height:'610px', railVisible: true});
      </script>
      

      <img src="image/pic/train_3car_parts.png" usemap = "#locodetail" style="margin-top: 20px;">
      <map name="locodetail">
        <!-- loco coords -->
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


        <!-- 1st car coords -->
        <area shape="rect" coords="1245,418,1354,445" href="#1stcarBogies" onmouseover="writeText('1st car Bogies')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Bogies">
        <area shape="rect" coords="1280,468,1391,495" href="#1stcarBattery" onmouseover="writeText('1st car Battery')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Battery">
        <area shape="rect" coords="1402,508,1538,535" href="#1stcarSteamVaporTraps" onmouseover="writeText('1st car Steam Vapor Traps')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Steam Vapor Traps">
        <area shape="rect" coords="1527,451,1636,478" href="#1stcarBrakeSet" onmouseover="writeText('1st car Brake Set')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Brake Set">
        <area shape="rect" coords="1661,451,1771,479" href="#1stcarWheels" onmouseover="writeText('1st car Wheels')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Wheels">
        <area shape="rect" coords="1726,404,1836,432" href="#1stcarSteelStep" onmouseover="writeText('1st car Steel Step')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Steel Step">
        <area shape="rect" coords="1660,497,1835,524" href="#1stcarSteamEndConnection" onmouseover="writeText('1st car Steam End Connection')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Steam End Connection">
        <area shape="rect" coords="1634,126,1809,153" href="#1stcarSaftyTailGates" onmouseover="writeText('1st car Safty Tail Gates')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Safty Tail Gates">
        <area shape="rect" coords="1564,73,1673,101" href="#1stcarRoof" onmouseover="writeText('1st car Roof')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Roof">
        <area shape="rect" coords="1472,119,1582,147" href="#1stcarWindows" onmouseover="writeText('1st car Windows')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Windows">
        <area shape="rect" coords="1308,89,1417,116" href="#1stcarTumblehome" onmouseover="writeText('1st car Tumblehome')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Tumblehome">
        <area shape="rect" coords="1160,149,1270,177" href="#1stcarDoors" onmouseover="writeText('1st car Doors')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="1st car Doors">


        <!-- 2nd car coords -->
        <area shape="rect" coords="1937,417,2047,445" href="#2ndcarBogies" onmouseover="writeText('2nd car Bogies')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Bogies">
        <area shape="rect" coords="1973,467,2048,495" href="#2ndcarBattery" onmouseover="writeText('2nd car Battery')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Battery">
        <area shape="rect" coords="2095,508,2231,535" href="#2ndcarSteamVaporTraps" onmouseover="writeText('2nd car Steam Vapor Traps')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Steam Vapor Traps">
        <area shape="rect" coords="2220,450,2329,478" href="#2ndcarBrakeSet" onmouseover="writeText('2nd car Brake Set')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Brake Set">
        <area shape="rect" coords="2353,451,2462,479" href="#2ndcarWheels" onmouseover="writeText('2nd car Wheels')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Wheels">
        <area shape="rect" coords="2419,404,2528,432" href="#2ndcarSteelStep" onmouseover="writeText('2nd car Steel Step')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Steel Step">
        <area shape="rect" coords="2353,497,2528,524" href="#2ndcarSteamEndConnection" onmouseover="writeText('2nd car Steam End Connection')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Steam End Connection">
        <area shape="rect" coords="2327,125,2501,153" href="#2ndcarSaftyTailGates" onmouseover="writeText('2nd car Safty Tail Gates')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Safty Tail Gates">
        <area shape="rect" coords="2256,73,2366,101" href="#2ndcarRoof" onmouseover="writeText('2nd car Roof')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Roof">
        <area shape="rect" coords="2165,119,2275,147" href="#2ndcarWindows" onmouseover="writeText('2nd car Windows')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Windows">
        <area shape="rect" coords="2001,89,2110,117" href="#2ndcarTumblehome" onmouseover="writeText('2nd car Tumblehome')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Tumblehome">
        <area shape="rect" coords="1853,149,1963,177" href="#2ndcarDoors" onmouseover="writeText('2nd car Doors')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="2nd car Doors">


        <!-- 3rd car coords -->
        <area shape="rect" coords="2629,418,2738,445" href="#3rdcarBogies" onmouseover="writeText('3rd car Bogies')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Bogies">
        <area shape="rect" coords="2666,468,2776,495" href="#3rdcarBattery" onmouseover="writeText('3rd car Battery')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Battery">
        <area shape="rect" coords="2787,507,2923,535" href="#3rdcarSteamVaporTraps" onmouseover="writeText('3rd car Steam Vapor Traps')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Steam Vapor Traps">
        <area shape="rect" coords="2921,450,3021,478" href="#3rdcarBrakeSet" onmouseover="writeText('3rd car Brake Set')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Brake Set">
        <area shape="rect" coords="3045,451,3155,479" href="#3rdcarWheels" onmouseover="writeText('3rd car Wheels')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Wheels">
        <area shape="rect" coords="3111,404,3220,432" href="#3rdcarSteelStep" onmouseover="writeText('3rd car Steel Step')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Steel Step">
        <area shape="rect" coords="3045,497,3220,525" href="#3rdcarSteamEndConnection" onmouseover="writeText('3rd car Steam End Connection')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Steam End Connection">
        <area shape="rect" coords="3019,125,3194,153" href="#3rdcarSaftyTailGates" onmouseover="writeText('3rd car Safty Tail Gates')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Safty Tail Gates">
        <area shape="rect" coords="2949,73,3058,101" href="#3rdcarRoof" onmouseover="writeText('3rd car Roof')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Roof">
        <area shape="rect" coords="2857,119,2967,147" href="#3rdcarWindows" onmouseover="writeText('3rd car Windows')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Windows">
        <area shape="rect" coords="2693,89,2803,117" href="#3rdcarTumblehome" onmouseover="writeText('3rd car Tumblehome')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Tumblehome">
        <area shape="rect" coords="2545,149,2655,177" href="#3rdcarDoors" onmouseover="writeText('3rd car Doors')" onmouseout="writeText('ตรวจสภาพอะไหล่')" alt="3rd car Doors">
      </map>
    </div>
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