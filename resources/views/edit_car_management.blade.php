<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMU Utilization System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet" >
  <link href="css/bootstrap-responsive.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css?family=Trirong:400" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/form.css">

  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!--Javascript Function-->
  <script type="text/javascript">
    //Active Event Navbar
    /*$(document).ready(function(){
      $('ul.nav > li').click(function(e){
        e.preventDefault();
        $('ul.nav > li').removeClass('active');
        $(this).addClass('active');
      });
    });*/
  </script>

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
        <h1 class="margin"><center>แก้ไขข้อมูลศูนย์ซ่อม</center></h1>
        <form class="form-horizontal">
          <!--No.Depot-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="depotno">รหัสศูนย์ซ่อม</label>
            <div class="col-sm-offset-2 col-sm-3">
              <p class="form-control-static" style="color: #13a381;">GENARATE</p>
            </div>
          </div>

          <!--Model-->
          <div class="form-group">
            <label class="control-label col-sm-5 for="cdmodel">โมเดล</label>
            <select class="col-sm-offset-2 col-sm-3" id="cdmodel" name="cdmodel">
              <option value="4cc">4cc</option>
            </select>
          </div>

          <!--Capacity-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="capacity">จำนวนที่รับได้</label>
            <select class="col-sm-offset-2 col-sm-3" id="capacity" name="capacity">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

          <!--Position-->
          <div class="form-group margin">
            <label class="control-label col-sm-5" for="depotno">ตำแหน่ง</label>
            <select class="col-sm-offset-2 col-sm-3" id="depotno" name="depotno">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>

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