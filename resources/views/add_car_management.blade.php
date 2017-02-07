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
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li class="active"><a href='../car_management'>จัดการตู้รถไฟ</a></li>
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
        <h1 class="margin"><center>เพิ่มข้อมูลตู้รถไฟ</center></h1>
        <form class="form-horizontal" action="add_cars">
         

          <!--Model-->
          <div class="form-group margin">
            <label class="control-label col-sm-5" for="cars_model" >Model</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="cars_model">
          </div>

          <!--Type-->
          <div class="form-group margin">
             <label class="control-label col-sm-5" for="cars_type">ชนิดของตู้รถไฟ</label>
             <select class="col-sm-offset-2 col-sm-3" id="cars_type" name="cars_type">
              <option value="1">ขนส่ง</option>
              <option value="2">โดยสารประเภทขับเคลื่อนได้</option>
              <option value="3">โดยสารประเภทขับเคลือนไม่ได้</option>
              </select>
          </div>


          <!--Price-->
          <div class="form-group margin">
            <label class="control-label col-sm-5" for="cars_price" >ราคา</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="cars_price">
          </div>

          <!--Price-->
          <div class="form-group margin">
            <label class="control-label col-sm-5" for="cars_qty" >จำนวน</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="cars_qty">
          </div>

          <!--Button Save & Cancel-->
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button formaction="../part_management" value="cancel" class="btn-cancel"><span>Cancel</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>