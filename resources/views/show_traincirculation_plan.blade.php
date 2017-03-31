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
            <li class="dropdown normal">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การใช้ชุดรถไฟ<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='../traincirculation_plan'>ระบบจัดการแผนใช้ชุดรถไฟ</a></li>
                <li class="normal"><a href='../'>ระบบจัดการการใช้ชุดรถไฟ</a></li>
                </ul>
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
    
            
            
           <a href='../traincirculation_plan/save'>สร้างแผนการใช้ชุดรถไฟ</a>
           <a href='../traincirculation_plan/cancel'>ยกเลิก</a>

           
       

    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>ทริป</th>
                <th>ชุดรถไฟ</th>
                <th>ชนิด</th>
                <th>สถานีต้นทาง</th>
                <th>เวลาออก</th>
                <th>สถานีปลายทาง</th>
                <th>เวลาถึง</th>
                <th>เที่ยว</th>
      
                
              </tr>
            </thead>
            <tbody>
           @foreach($plan as $ts)
              <tr>
                <td>{{$ts->train_trip}}</td>
                <td>{{$ts->train_number}}</td>
                <td>{{$ts->class}}</td>
                <td>{{$ts->source_station}}</td>
                <td>{{$ts->departure_time}}</td>
                <td>{{$ts->destination_station}}</td>
                <td>{{$ts->arrival_time}}</td>
                <td  id='{{$ts->id}}triptype'>{{$ts->trip_type}}</td>
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

    
  <!--Footer-->

</body>
</html>