<!DOCTYPE html>
<html lang="en">
<head>
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

<body data-spy="scroll">

  <!--Header-->
    <!-- Navbar -->
    <nav class="navbar navbar-default">
     <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href='../'>EMU Utilization System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ</a></li>
            <li class="active"><a href='../maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../depot_management'>จัดการตู้รถไฟ</a></li>
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
        <h1 class="margin"><center>เพิ่มข้อมูลใบเข้าซ่อม</center></h1>
        <form class="form-horizontal" action="/add_maintenance_plan">
          <!--No.Maintenance-->
        
          <!--No.Train Set-->
          <div class="form-group">
            <label class="control-label col-sm-5 for="trainsetno">รหัสชุดรถไฟ</label>
            
            <select class="col-sm-offset-2 col-sm-3" id="trainsetno" name="trainsetno"> @foreach ($trian_set_info as $info)
              <option value={{$info->train_set_number}} >{{$info->train_set_number}}</option>
           @endforeach 
              
            </select>
          </div>

          <!--Depot Location name-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="depotno">รหัสศูนย์ซ่อม</label>
            <select class="col-sm-offset-2 col-sm-3" id="depot" name="depotno">
            @foreach ($depot_info as $info)
              <option value={{$info->location_name}}>{{$info->location_name}}</option>
              @endforeach
              
            </select>
          </div>

          <!--Level-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="level">ระดับ</label>
            <select class="col-sm-offset-2 col-sm-3" id="level" name="level">
            @foreach ($level_info as $info)
              <option value={{$info->level}}>{{$info->level}}</option>
              @endforeach
            </select>
          </div>

          <!--Enter DateTime-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="endate">วันเวลาเข้า</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="date" value="in_date" >
          </div>

          <!--Leave DateTime-->
          <!-- <div class="form-group margin">
            <label class="control-label col-sm-5" for="lvdate">วันเวลาออก</label>
            <select class="col-sm-offset-2 col-sm-3" id="lvdate" name="lvdate">
              <option value="YY.MM.DD HH.mm.ss">YY.MM.DD HH.mm.ss</option>
            </select>
          </div> -->

          <!--Button Save & Cancel-->
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button formaction="../maintenance_plan" value="cancel" class="btn-cancel"><span>Cancel</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>s