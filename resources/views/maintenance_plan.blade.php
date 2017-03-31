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
                <li class="active"><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
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
    <div class="container-fluid">
    <!--First Container-->
      <div class="row col-md-12 margin">
        <form class="form-inline" action="search_train_set1">

          <div class="form-group">
            <label for="trainsetno"><h3 class="margin label-padding">รหัสชุดรถไฟ</h3></label>
            <input type="text" name="trainsetno" class="sel-3">
          </div>

          <div class="form-group">
            <label for="trsettype"><h3 class="margin label-padding">ประเภท</h3></label>
            <select id="trsettype" name="trsettype" class="sel sel-3">
              <option value='not'>เลือกประเภทชุดรถไฟ</option>
              <option value="trcar3">ชุดรถไฟโดยสาร 3</option>
              <option value="trcar4">ชุดรถไฟโดยสาร 4</option>
          <!--  <option value="trgoods">ชุดรถไฟขนส่ง</option>
                <option value="trtrolley">รถรางโยก</option> -->
            </select>
          </div>

          <div class="form-group">
            <label for="trstatus"><h3 class="margin label-padding">สถานะ</h3></label>
            <select id="trstatus" name="trstatus" class="sel sel-3">
              <option value='not'>เลือกสถานะชุดรถไฟ</option>
              <option value="ไม่ว่าง">ไม่ว่าง</option>
              <option value="ว่าง">ว่าง</option>
              <option value="ซ่อม">ซ่อม</option>
            </select>
          </div>

          <div class="form-group">
            <label for="search"><h3 class="margin"><span></span></h3></label>
            <button type="submit" value="Search" class="btn-search"><span>Search</span></button>

            <label for="addtr"><h3 class="margin"><span></span></h3></label>
            <button formaction="../create_maintenance_plan" class="btn-add" style="vertical-align: middle"><span>
              สร้างแผนอัตโนมัติ</span></button>

            
          </div>
        </form> 
      </div>

    <!--Second Container-->
      <!--Table Detail-->

       

      <div class="row col-md-12 margin">
        <div class="table-responsive">
           <form action="/add_maintenance_plan">
              <button type="submit" value="Save" class="btn-save"><span>ตกลง</span></button>
          <table class="table">
            <thead>
              <tr>
                <th>เลือก</th>
                <th>รหัสชุดรถไฟ</th>
                <th>ประเภท</th>
                <th>ระยะทางสะสม</th>
                <th>ระยะเวลาสะสม</th>
                <th>สถานะ</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($trainset_info as $info)
            <tr id="{{$info->train_number}}">
               
                <td><input type="checkbox" name="choose" value={{$info->train_number}}></td>
                <td>{{$info->train_number}}</td>
                <td id="{{$info->train_number}}1" >{{$info->type}}</td>        
                <td>{{$info->total_distance}}</td>
                <td>{{$info->total_time}}</td>                
                <td>{{$info->status}}</td>
                <td>{{$info->level}}</td>
              </tr>

              <!-- JS change name cartype -->
              <script type="text/javascript">
                var trtype = document.getElementById("{{$info->train_number}}1").innerHTML;
                switch(trtype){
                  case "trcar3": document.getElementById("{{$info->train_number}}1").innerHTML= 'ชุดรถไฟโดยสาร 3';break;
                  case "trcar4": document.getElementById("{{$info->train_number}}1").innerHTML= 'ชุดรถไฟโดยสาร 4'; break;
                }
              </script>
              @foreach ($trainset_maintenance as $trainmain)
              <script type="text/javascript">
                
                var train_number =  parseInt(document.getElementById("{{$info->train_number}}").id);
                var train_number1 = {{$trainmain->train_number}};
                  
                if( train_number == train_number1){
                  document.getElementById("{{$info->train_number}}").style.display = "none";
                console.log(train_number1);
                
                }
              </script>
              @endforeach
              
              
              @endforeach
              
            </tbody>
          </table>
          {{$trainset_info->links()}}
          </form>
        </div>      
      </div>
    </div>


   
  <!--Footer-->
</body>
</html>