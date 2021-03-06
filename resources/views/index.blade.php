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
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การใช้ชุดรถไฟ<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='../traincirculation_plan'>ระบบจัดการแผนใช้ชุดรถไฟ</a></li>
                <li class="active"><a href='../'>ระบบจัดการการใช้ชุดรถไฟ</a></li>
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
    <div class="container-fluid text-left" style="min-height: 100%;">
      <!--Date Current-->
      <div class="row col-md-12 margin">
        <h1 id="datenow" class="margin"></h1>
        <script type="text/javascript">
          now = new Date();
          var thday = new Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
          var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม" ,"สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

          document.getElementById("datenow").innerHTML = "วัน" + thday[now.getDay()] + "ที่" + " " + now.getDate() + " " + thmonth[now.getMonth()] + " " + (0+now.getFullYear()+543);
        </script>
      </div>

      <!--Search Form-->
      <div class="row col-md-12 margin text-center">
        <form class="bg-5">
          <!--Date-->
          <div class="form-group">
           <!--  <label for="date"><h3 class="margin label-padding1">วันที่</h3></label>
            <input type="date" id="date" name="date"  class="td-add">
                 

            <label for="originstate"><h3 class="margin label-padding1">สถานีต้นทาง</h3></label>
            <select id="originstate" name="originstate" class="sel sel-2">
              
            </select> 

            <label for="destinationstate"><h3 class="margin label-padding1">สถานีปลายทาง</h3></label>
            <select id="destinationstate" name="destinationstate" class="sel sel-2">
              
            </select>

            <button type="submit" value="Search" class="btn-search"><span>Search</span></button> -->
          
            
          </div>
        </form>
      </div>

    
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">          
          <table class="table" id="mytable">
            <thead style="background-color: #ff6f00; color: #ffffff;">
              <tr>  
                <th class="text-center">ทริป</th>
                <th class="text-center">รหัสชุดรถไฟ</th>
                <th class="text-center">ชนิด</th>
                <th class="text-center">สถานีต้นทาง</th>
                <th class="text-center">เวลาออก</th>
                <th class="text-center">สถานีปลายทาง</th>
                <th class="text-center">เวลาถึง</th>
                <th class="text-center">เที่ยว</th>
                <th class="text-center th-edit">แก้ไข</th>
              </tr>
            </thead>
            
            <tbody>
           
            @foreach($train_schedule_info as $train)
              <tr id='{{$train->train_trip}}'>
                <td class="text-center">{{$train->train_trip}}</td>
                <td class="text-center">{{$train->train_number}}</td>
                <td class="text-center">{{$train->class}}</td>
                <td class="text-center">{{$train->source_station}}</td>
                <td class="text-center" id='{{$train->train_trip}}d'>{{$train->departure_time}}</td>
                <!-- <td class="text-center" id="{{$train->departure_time}}time"></td> -->
                <td class="text-center">{{$train->destination_station}}</td>
                <td class="text-center" id='{{$train->train_trip}}a'>{{$train->arrival_time}}</td>
                <td class="text-center" id='{{$train->id}}triptype'>{{$train->trip_type}}</td>
                <td class="text-center"><a href="/edit_traincirculation/{{$train->train_trip}}"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <!-- JavaScript Foreach -->
              <script type="text/javascript">
                var type = document.getElementById('{{$train->id}}triptype').innerHTML;
                if(type == "outbound"){
                  document.getElementById('{{$train->id}}triptype').innerHTML = "เที่ยวไป"
                }else{
                  document.getElementById('{{$train->id}}triptype').innerHTML = "เที่ยวกลับ"
                }

                var departure = document.getElementById('{{$train->train_trip}}d').innerHTML.substring(0,5)
                var arrival = document.getElementById('{{$train->train_trip}}a').innerHTML.substring(0,5)
                document.getElementById('{{$train->train_trip}}d').innerHTML = departure;
                document.getElementById('{{$train->train_trip}}a').innerHTML = arrival;
              </script>
                
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