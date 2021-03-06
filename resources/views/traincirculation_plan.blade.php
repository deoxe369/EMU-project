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
    <!--First Container-->
    <div class="container-fluid">
      <h1 class="margin" style="text-align: center;">ระบบจัดการแผนใช้ชุดรถไฟ</h1>
      
      <br>

      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <!--Date Current-->
        <div>
          <a href="/create_traincirculation_plan"><button class="btn-add" style="vertical-align: middle"><span>สร้างแผนการใช้ชุดรถไฟอัตโนมัติ</span></button></a>
          <span style="float: right;">
            <a href="../traincirculation_plan/save"><button type="submit" value="Save" class="btn-save"><span>ยืนยันแผนการใช้ชุดรถไฟเอง</span></button></a>
            <a href="../traincirculation_plan_manual/cancel"><button type="reset" value="reset" class="btn-cancel"><span>รีเซต</span></button></a>
          </span>
        </div>
        
            
          
        <div class="table-responsive">          
          <table class="table" id="mytable">
            <thead>
              <tr>  
                <th class="text-center">ทริป</th>
                <th class="text-center">ชนิด</th>
                <th class="text-center">เส้นทาง</th>
                <th class="text-center">เวลาออก</th>
                <!-- <th class="text-center">สถานีปลายทาง</th> -->
                <th class="text-center">เวลาถึง</th>
                <th class="text-center">เที่ยว</th>
                <th class="text-center th-edit">เพิ่มชุดรถไฟ</th>
                
               </tr>
            </thead>
            <tbody>
            @foreach($time_table_info as $time_table)
              <tr id="{{$time_table->id}}">
                <td class="text-center" style="padding-top: 25px; margin-left: 5px;">{{$time_table->id}}</td>
                <td class="text-center" style="padding-top: 25px; margin-left: 5px;">{{$time_table->class}}</td>
                <td class="text-center" style="padding-top: 25px; margin-left: 5px;">{{$time_table->source_station}} - {{$time_table->destination_station}}</td>
                <td class="text-center" style="padding-top: 25px; margin-left: 5px;" id='{{$time_table->id}}d'>{{$time_table->departure_time}}</td>
                <!-- <td class="text-center" style="padding-top: 25px; margin-left: 5px;">{{$time_table->destination_station}}</td> -->
                <td class="text-center" style="padding-top: 25px; margin-left: 5px;" id='{{$time_table->id}}a'>{{$time_table->arrival_time}}</td>
                <td class="text-center" style="padding-top: 25px; margin-left: 5px;" id='{{$time_table->id}}triptype'>{{$time_table->trip_type}}</td>
                <td class="text-center" style="padding-top: 15px; margin-left: 5px;" id="{{$time_table->id}}add" title={{$time_table->id}}><a href="../traincirculation_plan/{{$time_table->id}}"  ><button class="btn-madd" style="vertical-align: middle">เพิ่มตู้รถไฟ &#10010;</button></a></td>
               </tr>
              <!-- JavaScript Foreach -->
              <script type="text/javascript">
                
                //rename
                var type = document.getElementById('{{$time_table->id}}triptype').innerHTML
                if(type == "outbound"){
                  document.getElementById('{{$time_table->id}}triptype').innerHTML = "เที่ยวไป"
                }else{
                  document.getElementById('{{$time_table->id}}triptype').innerHTML = "เที่ยวกลับ"
                }
                var departure = document.getElementById('{{$time_table->id}}d').innerHTML.substring(0,5)
                var arrival = document.getElementById('{{$time_table->id}}a').innerHTML.substring(0,5)
                document.getElementById('{{$time_table->id}}d').innerHTML = departure;
                document.getElementById('{{$time_table->id}}a').innerHTML = arrival;
                  </script>
                   @foreach($train_schedule_info as $ts)
                   <script type="text/javascript">
                      var trip1 = {{$time_table->id}};
                      var trip2 = {{$ts->train_trip}};
                      var train_number = {{$ts->train_number}};
                     if(trip1 == trip2){
                      document.getElementById('{{$time_table->id}}add').innerHTML =train_number;
;                     }
                      console.log(trip2);
                   </script>
                   @endforeach
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