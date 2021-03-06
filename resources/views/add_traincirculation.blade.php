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
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การใช้ชุดรถไฟ<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="active"><a href='../traincirculation_plan'>ระบบจัดการแผนใช้ชุดรถไฟ</a></li>
                <li class="normal"><a href='../'>ระบบจัดการการใช้ชุดรถไฟ</a></li>
              </ul>
            </li>
            <li class="dropdown normal">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li class="normal"><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
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
    
      <div class="container">
        <h1 class="margin" style="text-align: center;">เพิ่มข้อมูลการใช้ชุดรถไฟ</h1>
        
        <br>

        <!--First Container-->
        <form class="form-horizontal" action="/traincirculation_plan_manual" name="chktrcir" onsubmit="return trcir()">
        <!-- <form class="form-horizontal" action="/traincirculation_plan_manual/save" name="chktrcir" onsubmit="return trcir()"> -->
        
          <div class="bg-5 row col-md-12 margin">

            <!-- Trip No. Title-->
            <h2 class="text-center">
              <span>รายละเอียดของ</span>
              <span style="color: #ffab00; font-weight: bold;">ทริป {{$origin_info[0]->id}}</span>
            </h2>

            <br>

            <!-- Table Detail -->
            <div class="table-responsive">  
              <table class="table" align="center">
                <!-- row1 -->
                <tr>
                  <td class="col-sm-2 bg-11">ชนิด</td>
                  <td class="bg-8 col-sm-3 text-center">{{$origin_info[0]->class}}</td>

                  <td class="col-md-1"><span></span></td>

                  <td class="col-sm-2 bg-11">เที่ยว</td>
                  <td class="bg-8 col-sm-3 text-center" id="{{$origin_info[0]->id}}triptype">{{$origin_info[0]->trip_type}}</td>
                </tr>

                <!-- row2 -->
                <tr>
                  <td class="col-sm-2 bg-11">สถานีต้นทาง</td>
                  <td class="bg-8 col-sm-3 text-center">{{$origin_info[0]->source_station}}</td>

                  <td class="col-md-1"><span></span></td>

                  <td class="col-sm-2 bg-11">สถานีปลายทาง</td>
                  <td class="bg-8 col-sm-3 text-center">{{$origin_info[0]->destination_station}}</td>
                </tr>

                <!-- row3 -->
                <tr>
                  <td class="col-sm-2 bg-11">เวลาออก</td>
                  <td class="bg-8 col-sm-3 text-center" id="departure">{{$origin_info[0]->departure_time}}</td>

                  <td class="col-md-1"><span></span></td>

                  <td class="col-sm-2 bg-11">เวลาถึง</td>
                  <td class="bg-8 col-sm-3 text-center" id="arrival">{{$origin_info[0]->arrival_time}}</td>
                </tr>
             </table>
            </div>
          </div>


          <!-- Second Contrainer -->
          <div class="row col-md-12 margin">

            <br><br>

            <!-- Choose Trainset No. Title-->
            <h2 class="text-center">
              <span>เลือกชุดรถไฟของ</span>
              <span style="color: #ffab00; font-weight: bold;">ทริป {{$origin_info[0]->id}}</span>
            </h2>

            <!-- New Structure: Table -->
            <div class="table-responsive">          
              <table class="table" id="mytable">
                <thead>
                  <tr>  
                    <th class="text-center th-edit">เลือก</th>
                    <th class="text-center">รหัสชุดรถไฟ</th>
                    <th class="text-center">ระยะทางสะสม</th>
                    <th class="text-center">ระยะเวลาสะสม</th>
                    <th class="text-center">ตำแหน่ง</th>
                  </tr>
                </thead>

                <tbody>
                  <!-- <tr>
                    <td class="text-center"><input type="radio" name="choose"></td>
                  </tr> -->
                  @foreach($train_set_info as $train)
                  <tr>
                    <td class="text-center"><input type="radio" name="trainsetno" value={{$train->train_number}}></td>
                    <td class="text-center">{{$train->train_number}}</td>
                    <td class="text-center">{{$train->total_distance}}</td>
                    <td class="text-center">{{$train->total_time}}</td>
                    <td class="text-center">{{$train->location_name}}</td>
                  </tr>
                  @endforeach  
                  <input type="hidden" name="trip" value={{$origin_info[0]->id}}>
                </tbody>
              </table>

              <!-- Javascript -->
              <script type="text/javascript">
                var type = document.getElementById('{{$origin_info[0]->id}}triptype').innerHTML;
                if(type == "outbound"){
                  document.getElementById('{{$origin_info[0]->id}}triptype').innerHTML = "เที่ยวไป"
                }else{
                  document.getElementById('{{$origin_info[0]->id}}triptype').innerHTML = "เที่ยวกลับ"
                }

                var departure = document.getElementById('departure').innerHTML.substring(0,5)
                var arrival = document.getElementById('arrival').innerHTML.substring(0,5)
                document.getElementById('departure').innerHTML = departure;
                document.getElementById('arrival').innerHTML = arrival;
              </script>

              <br>

              <!-- Alert: Check Form -->
              <span id="chktrcir_trsetno" class="checkform"></span>

              <br>

              <!--Button Save & Cancel-->
              <div style="text-align: center;">
                <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
                <button type="button" value="Cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

    
  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>