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
      <div>
        <form class="form-horizontal" action="search">
          <label for="trainsetno"><h3 class="margin">รหัสชุดรถไฟ</h3></label>
          <input type="text" name="trainsetno">

          <label for="trsettype"><h3 class="margin">ชนิด</h3></label>
          <select id="trsettype" name="trsettype">
            <option value="มกราคม">มกราคม</option>
            <option value="กุมภาพันธ์">กุมภาพันธ์</option>
          </select>

          <label for="trstatus"><h3 class="margin">สถานะ</h3></label>
          <select id="trstatus" name="trstatus">
            <option value="มกราคม">มกราคม</option>
            <option value="กุมภาพันธ์">กุมภาพันธ์</option>
          </select>

          <button type="submit" value="Search" class="btn-search"><span>Search</span></button>

        </form>

    <!--Second Container-->
        <div class="text-right margin">
          <a href="../add_trainset_management"><button class="btn-add" style="vertical-align: middle"><span>เพิ่มชุดรถไฟ</span></button></a>
        </div>      
      </div>
    <!--Third Container-->
      <!--Table Detail-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>รหัสชุดรถไฟ</th>
                <th>ชนิด</th>
                <th>ระยะทางสะสม</th>
                <th>ระยะเวลาสะสม</th>
                <th>สถานะ</th>
                <th style="color: #f4511e;">แก้ไข</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>423</td>
                <td>All</td>                
                <td>500 km</td>
                <td>YY.HH.DD
                HH.mm.ss</td>                
                <td>1</td>
                <td><a href='../edit_trainset_management'><img src="image/edit_orange.png" onmouseover="this.src='image/edit_yellow.png'" onmouseout="this.src='image/edit_orange.png'"></a></td>
              </tr>
              <tr>
                <td>423</td>
                <td>All</td>                
                <td>500 km</td>
                <td>YY.HH.DD
                HH.mm.ss</td>                
                <td>1</td>
                <td><a href='../edit_trainset_management'><img src="image/edit_orange.png" onmouseover="this.src='image/edit_yellow.png'" onmouseout="this.src='image/edit_orange.png'"></a></td>
              </tr>
            </tbody>
          </table>
        </div>      
    </div>

    
  <!--Footer-->

</body>
</html>