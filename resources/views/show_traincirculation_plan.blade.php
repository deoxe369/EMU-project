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

  <!-- Javascript Table: Row Color -->
  <script language="javascript">
    window.onload = function () {    
      var a=document.getElementById('mytable');
      for(i=0;i<a.rows.length;i++){
        if(i>0){
          if(i%2==1){
            a.rows[i].className="bg-8";
          }else{
            a.rows[i].className="bg-7";
          } 
        }else{
        // a.rows[i].className="tr_head"; 
        } 
      }
    }
  </script>

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
            <!-- <li class="active"><a href='../'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li> -->
            <li class="dropdown  active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การใช้ชุดรถไฟ<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="active"><a href='../traincirculation_plan'>ระบบจัดการแผนใช้ชุดรถไฟ</a></li>
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
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
  <div class="content">

    <div class="container-fluid">    
    <!--First Container-->
    <h1 class="margin" style="text-align: center;">ยืนยันแผนการใช้ชุดรถไฟ</h1>
      
    <br>
      
    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <!-- Button -->
        <div class="text-right">
          <a href='../traincirculation_plan/save'><button class="btn-save" style="vertical-align: middle"><span>บันทึกแผนการใช้ชุดรถไฟ</span></button></a>
          <a href='../traincirculation_plan/cancel'><button class="btn-del" style="vertical-align: middle"><span>ยกเลิก</span></button></a>
        </div>

        <div class="table-responsive">
          <table class="table" id="mytable">
            <thead>
              <tr>
                <th class="text-center">ทริป</th>
                <th class="text-center">ชุดรถไฟ</th>
                <th class="text-center">ชนิด</th>
                <th class="text-center">สถานีต้นทาง</th>
                <th class="text-center">เวลาออก</th>
                <th class="text-center">สถานีปลายทาง</th>
                <th class="text-center">เวลาถึง</th>
                <th class="text-center">เที่ยว</th>
              </tr>
            </thead>
            
            <tbody>
           @foreach($plan as $ts)
              <tr>
                <td class="text-center">{{$ts->train_trip}}</td>
                <td class="text-center">{{$ts->train_number}}</td>
                <td class="text-center">{{$ts->class}}</td>
                <td class="text-center">{{$ts->source_station}}</td>
                <td class="text-center">{{$ts->departure_time}}</td>
                <td class="text-center">{{$ts->destination_station}}</td>
                <td class="text-center">{{$ts->arrival_time}}</td>
                <td class="text-center" id='{{$ts->id}}triptype'>{{$ts->trip_type}}</td>
                <script type="text/javascript">
                var type = document.getElementById('{{$ts->id}}triptype').innerHTML
                if(type == "outbound"){
                  document.getElementById('{{$ts->id}}triptype').innerHTML = "เที่ยวไป"
                }else{
                  document.getElementById('{{$ts->id}}triptype').innerHTML = "เที่ยวกลับ"
                }
                </script>
              </tr>
               @endforeach
            </tbody>
          </table>
        </div> 
      </div>     
    </div>
  </div>

    
  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>