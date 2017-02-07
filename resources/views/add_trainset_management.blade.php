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
            <li><a href='../maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
            <li class="active"><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
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
        <h1 class="margin"><center>เพิ่มข้อมูลชุดรถไฟ</center></h1>
        <form class="form-horizontal" action="add_trainset">

          
          <!--No.Train Set-->
          <!--<div class="form-group">
            <label class="control-label col-sm-5" for="trainsetno">รหัสชุดรถไฟ</label>
            <div class="col-sm-offset-2 col-sm-3">
              <p class="form-control-static" style="color: #13a381;">GENARATE</p>
            </div>-->

          <!--Types Of Train Set-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="trsettype">ชนิด</label>
            <select class="col-sm-offset-2 col-sm-3" id="trsettype" name="trsettype">
              <option value="ชุดรถไฟโดยสาร 3">ชุดรถไฟโดยสาร 3</option>
              <option value="ชุดรถไฟโดยสาร 4">ชุดรถไฟโดยสาร 4</option>
              <option value="ชุดรถไฟขนส่ง">ชุดรถไฟขนส่ง</option>
              <option value="รถราง">รถราง</option>
            </select>
          </div>

          <!--Composition-->
          <!--<div class="form-group margin">
            <label class="control-label col-sm-5" for="composition">Composition</label>
            <select class="col-sm-offset-2 col-sm-3" id="composition" name="composition">
              <option value="D1">D1</option>
              <option value="D2">D2</option>
              <option value="D3">D3</option>
              <option value="D4">D4</option>
              <option value="D5">D5</option>
            </select>
          </div>-->

          <!--Button Save & Cancel-->
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button value="cancel" class="btn-cancel"><span>Cancel</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>