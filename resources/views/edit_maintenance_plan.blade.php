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
  <script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ URL::asset('/js/bootstrap.min.js') }} "></script>
  <script src="{{ URL::asset('/js/function.js') }}"></script>
</head>

<body data-spy="scroll">

  <!--Header-->
    <!-- Navbar -->
     <nav class="navbar navbar-default b">
      <div class="container-fluid2">
        <!-- Brand and toggle get grouped for better mobile display-->
        <div class="navbar-header bg-5">
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
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin"><center>แก้ไขข้อมูลใบเข้าซ่อม</center></h1>
        <form class="form-horizontal">
          <!--No.Maintenance-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="maintainno">เลขเข้าซ่อม</label>
            <div class="col-sm-offset-2 col-sm-3">
              <p class="form-control-static" style="color: #13a381;">GENARATE</p>
            </div>
          </div>

          <!--No.Train Set-->
          <div class="form-group">
            <label class="control-label col-sm-5 for="trainsetno">รหัสชุดรถไฟ</label>
            <select class="col-sm-offset-2 col-sm-3" id="trainsetno" name="trainsetno">
              <option value="21">21</option>
              <option value="335">335</option>
              <option value="423">423</option>
              <option value="425">425</option>
              <option value="431">431</option>
            </select>
          </div>

          <!--No.Depot-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="depotno">รหัสศูนย์ซ่อม</label>
            <select class="col-sm-offset-2 col-sm-3" id="depotno" name="depotno">
              <option value="D1">D1</option>
              <option value="D2">D2</option>
              <option value="D3">D3</option>
              <option value="D4">D4</option>
              <option value="D5">D5</option>
            </select>
          </div>

          <!--Level-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="level">ระดับ</label>
            <select class="col-sm-offset-2 col-sm-3" id="level" name="level">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

          <!--Enter DateTime-->
          <div class="form-group">
            <label class="control-label col-sm-5" for="endate">วันเวลาเข้า</label>
            <select class="col-sm-offset-2 col-sm-3" id="endate" name="endate">
              <option value="YY.MM.DD HH.mm.ss">YY.MM.DD HH.mm.ss</option>
            </select>
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
              <button value="cancel" class="btn-cancel"><span>Cancel</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>