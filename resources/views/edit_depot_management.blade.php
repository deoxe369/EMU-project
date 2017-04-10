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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
              </ul>
            </li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='../part_management'>จัดการอะไหล่</a></li>            
            <li class="active"><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
    <div class="container-fluid">    
    <!--First Container-->
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">แก้ไขข้อมูลศูนย์ซ่อม</h1>

        <br>

        <form class="form-horizontal" action="/edit_depot_management/{{$origin_info[0]->id}}/save" name="chkdepot" onsubmit="return depot()">
          
          <!--New Structure: Table-->
          <table class="table-add" align="center">

            <!--No.Depot-->
            <tr class="tr-add">
              <td class="td-add"><label for="depotno">รหัสศูนย์ซ่อม</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Generate No.Depot -->
              <td>
                <p class="form-control-static" style="color: #13a381; font-weight: bold; text-align: center;">{{$origin_info[0]->id}}</p>
              </td>
            </tr>

            <!-- location -->
            <tr class="tr-add">
              <td class="td-add"><label for="location">ตำแหน่งระยะทาง</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Choose location -->
              <td>
                <select id="location" name="location" class="sel">
                  <option value={{$origin_info[0]->location}} selected="selected">{{$origin_info[0]->location}}</option>
                  <!-- <option value=" ">เลือกตำแหน่งระยะทาง</option> -->
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
            </tr>

            <!-- Capacity -->
            <tr class="tr-add">
              <td class="td-add"><label for="capacity">จำนวนที่รับได้</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Choose Capacity -->
              <td>
                <select id="capacity" name="capacity" class="sel">
                  <option value={{$origin_info[0]->capacity}} selected="selected">{{$origin_info[0]->capacity}}</option>
                  <!-- <option value=" ">เลือกจำนวนที่รับชุดรถไฟได้</option> -->
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <!-- <span id="chkdepot_capacity" class="checkform"></span> -->
              </td>
            </tr>

            <!-- Position -->
            <tr class="tr-add">
              <td class="td-add"><label for="depotno">ชื่อตำแหน่ง</label></td>
              <td class="col-sm-1"><span></span></td>
              <td>
                <!-- Input Position -->
                <input type="text" name="location_name" value={{$origin_info[0]->location_name}}>
                <span id="chkdepot_locname" class="checkform"></span>
              </td>
            </tr>
            <!-- <div class="form-group margin">
            <label class="control-label col-sm-5" for="depotno">ตำแหน่ง</label>
            <select class="col-sm-offset-2 col-sm-3" id="depotno" name="depotno">
              <option value={{$origin_info[0]->location_name}} selected="selected">{{$origin_info[0]->location_name}}</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div> -->

            <!-- Level -->
            <tr class="tr-add">
              <td class="td-add"><label for="depotlevel">ระดับ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Choose Level -->
              <td>
                <select id="depotlevel" name="depotlevel" class="sel">
                  <option value={{$origin_info[0]->level}} selected="selected">{{$origin_info[0]->level}}</option>
                  <!-- <option value=" ">เลือกตำแหน่งศูนย์ซ่อม</option> -->
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <!-- <span id="chkdepot_level" class="checkform"></span> -->
              </td>
            </tr>

          </table>

          <br>

          <!--Button Save & Cancel-->
            <div style="text-align: center;">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button type="button" value="cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
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