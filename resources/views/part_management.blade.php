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
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript"></script>
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
          <form class="form-horizontal" action="search">

             <label class="control-label col-sm-1" for="cdmodel">ประเภท</label> 
             <select class="col-sm-offset-0 col-sm-2" id="part_type" name="part_type">          <option value='not'>ประเภท</option> 
                  @foreach ($part_type_info as $info)
                    <option value={{$info->part_type}}>{{$info->part_type}}</option>
                  @endforeach          
             </select>
             <label class="control-label col-sm-1" for="cdmodel">ยี่ห้อ</label> 
             <select class="col-sm-offset-0 col-sm-2" id="brand" name="brand">
             <option value='not'>ยี่ห้อ</option>           
                    @foreach ($part_brand_info as $info)
                    <option value={{$info->brand}}>{{$info->brand}}</option>
                  @endforeach 
              </select>   
                
              <label class="control-label col-sm-1" for="cdmodel">Car ID</label>   
              <select class="col-sm-offset-0 col-sm-2" id="part_cars_id" name="part_cars_id">
              <option value='not'>Car ID</option> 
                        @foreach ($part_cars_info as $info)
                    <option value={{$info->cars_id}}>{{$info->cars_id}}</option>
                  @endforeach 
                      
                </select>
             <button class="btn-search" style="vertical-align: middle"><span>ค้นหา</span></button></a>
         </form><br>

          <a href='../add_part_management'><button class="btn-add" style="vertical-align: middle"><span>เพิ่มอะไหล่</span></button></a>


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
                <td><a href='../edit_part_management/{{$info->id}}'><img src="image/edit_orange.png" onmouseover="this.src='image/edit_yellow.png'" onmouseout="this.src='image/edit_orange.png'"></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>      
    </div>

</body>
</html>