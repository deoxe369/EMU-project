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
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li>
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
            <li class="active"><a href='../part_management'>จัดการอะไหล่</a></li>            
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
    <div class="container-fluid">    
    <!--First Container-->
      <div>
        <form class="form-inline" action="search_part">

          <div class="form-group">
            <label for="part_type"><h3 class="margin">ประเภท</h3></label>
            <select id="part_type" name="part_type">          
              <option value='not'>ประเภท</option> 
                @foreach ($part_type_info as $info)
              <option value={{$info->part_type}}>{{$info->part_type}}</option>
                @endforeach          
            </select>
          </div>

          <div class="form-group">
            <label for="brand"><h3 class="margin">ยี่ห้อ</h3></label>
            <select id="brand" name="brand">
              <option value='not'>ยี่ห้อ</option>           
                @foreach ($part_brand_info as $info)
              <option value={{$info->brand}}>{{$info->brand}}</option>
                @endforeach 
            </select>   
          </div>

          <div class="form-group">
            <label for="part_cars_id"><h3 class="margin">รหัสตู้รถไฟ</h3></label>
            <select id="part_cars_id" name="part_cars_id">
              <option value='not'>Car ID</option> 
                @foreach ($part_cars_info as $info)
              <option value={{$info->cars_id}}>{{$info->cars_id}}</option>
                @endforeach  
            </select>
          </div>
          
          <div class="form-group">
            <label for="search"><h3 class="margin">&nbsp</h3></label>    
            <button class="btn-search" style="vertical-align: middle"><span>Search</span></button>

            <label for="addpart"><h3 class="margin">&nbsp</h3></label>
            <button formaction="../add_part_management" class="btn-add" style="vertical-align: middle"><span>เพิ่มอะไหล่</span></button>

            <!--add page: delete part_management-->
            <label for="delpart"><h3 class="margin">&nbsp</h3></label>
            <button formaction="../delete_part_management" class="btn-del" style="vertical-align: middle"><span>ลบอะไหล่</span></button>
          </div>
         </form>
        </div>

    <!--Second Container-->
      <!--Table Detail-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>รหัสอะไหล่</th>
                <th>ประเภท</th>
                <th>ยี่ห้อ</th>
                <th>เวลาสะสม</th>
                <th>ระยะทางสะสม</th>
                <th>Cars ID</th>
                <th>สถานะ</th>
                <th style="color: #f4511e;">แก้ไข</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($part_info as $info)
              <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->part_type}}</td>
                <td>{{$info->brand}}</td>                   
                <td>{{$info->total_distance}}</td>            
                <td>{{$info->total_time}}</td>
                <td>{{$info->cars_id}}</td>            
                <td>{{$info->status}}</td>         
                <td><a href='../edit_part_management/{{$info->id}}'><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>
              @endforeach

            </tbody>

          </table>
           {{$part_info->links()}}
        </div>      
    </div>

</body>
</html>