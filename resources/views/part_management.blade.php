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
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li class="active"><a href='../part_management'>จัดการอะไหล่</a></li>
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
    <div class="container-fluid">    
    <!--First Container-->
      <div class="text-right margin">
        <button class="btn-add" style="vertical-align: middle"><a href='../add_part_management'><span>เพิ่มศูนย์ซ่อม</span></a></button>
      </div>      
    <!--Second Container-->
      <!--Table Detail-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>รหัสศูนย์</th>
                <th>โมเดล</th>
                <th>จำนวนที่รับได้</th>
                <th>ตำแหน่ง</th>
                <th>สถานะ</th>
                <th style="color: #f4511e;">แก้ไข</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>02</td>
                <td>4cc</td>
                <td>4</td>                
                <td>6</td>            
                <td>1</td>
                <td><a href='../edit_part_management'><img src="image/edit_orange.png" onmouseover="this.src='image/edit_yellow.png'" onmouseout="this.src='image/edit_orange.png'"></a></td>
              </tr>
            </tbody>
          </table>
        </div>      
    </div>

    
  <!--Footer-->

</body>
</html>