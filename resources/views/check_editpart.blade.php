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
    <div class="container-fluid">
    <!--First Container-->
      <!-- Select Edit -->
      <div class="container">
        <h1 class="margin" style="text-align: center;">เปลี่ยนอะไหล่ของตู้รถไฟ</h1>

        <br>

        <form class="form-horizontal" action="#" name="chkedpart" onsubmit="return edpart()">

          <!-- New Structure: Table -->
          <table class="table-add" align="center">

            <!-- Part Type -->
            <tr class="tr-add">
              <td class="td-add"><label for="part_type">ประเภท</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Generate Part Type -->
              <td>
              <p class="form-control-static" style="color: #13a381; font-weight: bold;">Wheels</p>
            </td>
              
            </tr>

            <!-- No. Part -->
            <tr class="tr-add">
              <td class="td-add"><label for="partno">รหัสอะไหล่</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Select No. Part -->
              <td>
                <select id="partno" name="partno" class="sel">
                  <option value=" ">เลือกรหัสอะไหล่</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                <span id="chkedp_partno" class="checkform"></span>
              </td>
            </tr>

            <!-- Car ID -->
            <tr class="tr-add">
              <td class="td-add"><label for="carid">รหัสตู้รถไฟ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Select Car ID -->
              <td>
                <select id="carid" name="carid" class="sel">
                  <option value=" ">เลือกรหัสตู้รถไฟ</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                <span id="chkedp_carid" class="checkform"></span>
              </td>
            </tr>

            <!-- Total Distance -->
            <tr class="tr-add">
              <td class="td-add"><label for="totle_dist">ระยะทางสะสม</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Total Distance -->
              <td>
                <input type="number" name="totle_dist">
                <span id="chkedp_dist" class="checkform"></span>
              </td>
            </tr>

            <!-- Total Time -->
            <tr class="tr-add">
              <td class="td-add"><label for="totle_time">ระยะเวลาสะสม</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Total Time -->
              <td>
                <input type="time" name="totle_time">
                <span id="chkedp_time" class="checkform"></span>
              </td>
            </tr>
          </table>

          <br>

          <!--Button Save & Cancel-->
            <div style="text-align: center;">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button type="button" value="Cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
            </div>

        </form>
        
      </div>
    </div>
    
  
    

  <!--Footer-->
</body>
</html>