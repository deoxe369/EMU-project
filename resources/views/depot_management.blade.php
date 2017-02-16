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
    <nav class="navbar navbar-default">
     <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                      
          </button>
          <a class="navbar-brand" href='../'>EMU Utilization System </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ</a></li>
            <li><a href='../maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='../part_management'>จัดการอะไหล่</a></li>
            <li class="active"><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
    <div class="container-fluid">    
    <!--First Container-->
      <div class="text-right margin">
        <a href='../add_depot_management'><button class="btn-add" style="vertical-align: middle"><span>เพิ่มศูนย์ซ่อม</span></button></a>
      </div>      
    <!--Second Container-->
      <!--Table Detail-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>รหัสศูนย์</th>
                <th>จำนวนที่รับได้</th>
                <th>ตำแหน่ง</th>
                <th>สถานะ</th>
                <th style="color: #f4511e;">แก้ไข</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($depot_info as $info)
              <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->capacity}}</td>                
                <td>{{$info->location_name}}</td>            
                <td>{{$info->status}}</td>
                <td><a href='../edit_depot_management/{{$info->id}}'><img src="image/edit_orange.png" onmouseover="this.src='image/edit_yellow.png'" onmouseout="this.src='image/edit_orange.png'"></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$depot_info->links()}}
        </div>      
    </div>

    
  <!--Footer-->

</body>
</html>