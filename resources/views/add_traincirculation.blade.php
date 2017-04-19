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
    <!--First Container-->
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">เพิ่มข้อมูลการใช้ชุดรถไฟ</h1>
        
        <br>

        <form class="form-horizontal" action="/edit_traincirculation/{{$origin_info[0]->id}}/save">

          <!-- New Structure: Table -->
          <table class="table-add" align="center">

            <!-- No.Maintenance -->
            <tr class="tr-add">
              <td class="td-add"><label for="maintainno">ทริป</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Generate No.Maintenance -->
              <td>
                <p class="form-control-static" style="color: #13a381; font-weight: bold; text-align: center;">{{$origin_info[0]->id}}</p>
              </td>
               <input type="hidden" name="origin_train_number" value={{$origin_info[0]->train_number}}>
            </tr>


               <!-- Enter Datetime -->
          <tr class="tr-add">
            <td class="td-add"><label for="endate">ชนิด</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
              <p style="color: #000000; font-weight: bold; text-align: center;">{{$origin_info[0]->class}}</p>
            </td>
             <td class="td-add"><label for="endate">เที่ยว</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
              <p style="color: #000000; font-weight: bold; text-align: center;">{{$origin_info[0]->trip_type}}</p>
            </td>
            </tr>
            <tr>
            <td class="td-add"><label for="endate">สถานีต้นทาง</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
              <p style="color: #000000; font-weight: bold; text-align: center;">{{$origin_info[0]->source_station}}</p>
            </td>
             <td class="td-add"><label for="endate">เวลาออก</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
              <p id="departure" style="color: #000000; font-weight: bold; text-align: center;">{{$origin_info[0]->departure_time}}</p>
            </td>
            </tr>
            <tr>
             <td class="td-add"><label for="endate">สถานีปลายทาง</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
              <p style="color: #000000; font-weight: bold; text-align: center;">{{$origin_info[0]->destination_station}}</p>
            </td>
             <td class="td-add"><label for="endate">เวลาถึง</label></td>
            <td class="col-sm-1"><span></span></td>
            <!-- Input Enter Datetime -->
            <td>
             <p id="arrival" style="color: #000000; font-weight: bold; text-align: center;">{{$origin_info[0]->arrival_time}}</p>
            </td>
            
          </tr>


           
          </table>
         <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">          
          <table class="table" id="mytable">
            <thead style="background-color: #ff6f00; color: #ffffff;">
              <tr>  
                <th class="text-center">เลือก</th>
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
                
                
              
            
            </tbody>
          </table>
          <script type="text/javascript">
                var departure = document.getElementById('departure').innerHTML.substring(0,5)
                var arrival = document.getElementById('arrival').innerHTML.substring(0,5)
                document.getElementById('departure').innerHTML = departure;
                document.getElementById('arrival').innerHTML = arrival;
          </script>

          <br>
          <!--Button Save & Cancel-->
            <div style="text-align: center;">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button type="button" value="Cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
            </div>
        </form>
      </div>
    </div>
  </div>

    
  <!--Footer-->

  <!-- <footer class="bg-2">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer> -->

</body>
</html>