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
            <li class="dropdown normal">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การใช้ชุดรถไฟ<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='../traincirculation_plan'>ระบบจัดการแผนใช้ชุดรถไฟ</a></li>
                <li class="normal"><a href='../'>ระบบจัดการการใช้ชุดรถไฟ</a></li>
              </ul>
            </li>
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
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">แก้ไขข้อมูลใบเข้าซ่อม</h1>
        
        <br>

        <form class="form-horizontal" action="/edit_maintenance/{{$origin_info[0]->id}}/save" name="chkmaint" onsubmit="return maint()">

          <!-- New Structure: Table -->
          <table class="table-add" align="center">

            <!-- No.Maintenance -->
            <tr class="tr-add">
              <td class="td-add"><label for="maintainno">เลขเข้าซ่อม</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Generate No.Maintenance -->
              <td>
                <p class="form-control-static" style="color: #13a381; font-weight: bold; margin-left: 100px;">{{$origin_info[0]->id}}</p>
              </td>
            </tr>
            
            <!-- No.Trainset -->
            <tr class="tr-add">
              <td class="td-add"><label for="trainsetno">รหัสชุดรถไฟ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Chooose No.Trainset -->
              <td>
                <select id="trainsetno" name="trainsetno" class="sel">
                  <option value={{$origin_info[0]->train_number}}>{{$origin_info[0]->train_number}}</option>
                  <option value=" ">-- เลือกรหัสชุดรถไฟ --</option>
                  @foreach ($trian_set_info as $info)
                  <option value={{$info->train_number}} >{{$info->train_number}}</option>
                  @endforeach 
                </select>
                <span id="chkmaint_trsetno" class="checkform"></span>
              </td>
            </tr>
            
            <!-- No.Depot -->
            <tr class="tr-add">
              <td class="td-add"><label for="depotno">ศูนย์ซ่อม</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Choose No.Depot -->
              <td>
                <select id="depotno" name="depotno" class="sel">
                  <option value={{$origin_info[0]->depot}}>{{$origin_info[0]->depot}}</option>
                  <option value=" ">-- เลือกรหัสศูนย์ซ่อม --</option>
                  @foreach ($depot_info as $info)
                  <option value={{$info->location_name}}>{{$info->location_name}}</option>
                  @endforeach
                </select>
                <span id="chkmaint_depotno" class="checkform"></span>
              </td>
            </tr>

            <!--Level-->
            <!--<div class="form-group">
            <label class="control-label col-sm-5" for="level">ระดับ</label>
            <select class="col-sm-offset-2 col-sm-3" id="level" name="level">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div> -->

          <!-- Enter Datetime -->
          <tr class="tr-add">
            <td class="td-add"><label for="endate">วันเวลาเข้า</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
              <input type="date" name="endate" value={{$origin_info[0]->in_date}}>
              <span id="chkmaint_endate" class="checkform"></span>
            </td>
          </tr>

          <!--Leave DateTime-->
          <!-- <div class="form-group margin">
            <label class="control-label col-sm-5" for="lvdate">วันเวลาออก</label>
            <select class="col-sm-offset-2 col-sm-3" id="lvdate" name="lvdate">
              <option value="YY.MM.DD HH.mm.ss">YY.MM.DD HH.mm.ss</option>
            </select>
          </div> -->

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
  <footer class="bg-2">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>