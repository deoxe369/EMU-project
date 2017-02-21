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
                <li><a href='#'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li><a href='../maintenance_plan'>ระบบจัดการการเข้าซ่อม</a></li>
              </ul>
            </li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li class="active"><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='../part_management'>จัดการอะไหล่</a></li>            
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
    <div class="container-fluid">    
    <!--First Container-->
    <form class="form-inline" action="search_cars">

          <div class="form-group">
            <label for="cars_type"><h3 class="margin">ประเภท</h3></label>
            <select id="cars_type" name="cars_type">
              <option value='not'>ประเภท</option> 
              <option value="locamotive">โดยสารประเภทขับเคลื่อนได้</option>
              <option value="bogie">โดยสารประเภทขับเคลือนไม่ได้</option>
              <option value="logistic">ขนส่ง</option>
                       
            </select>
          </div>

          <div class="form-group">
            <label for="cars_model"><h3 class="margin">โมเดล</h3></label>
            <select id="cars_model" name="cars_model">
              <option value='not'>โมเดล</option>           
                 @foreach ($cars_model_info as $info)
              <option value={{$info->model}}>{{$info->model}}</option>
                @endforeach 
            </select>   
          </div>

          <div class="form-group">
            <label for="status"><h3 class="margin">สถานะ</h3></label>
            <select id="status" name="status">
              <option value='not'>สถานะ</option> 
                @foreach ($cars_status_info as $info)
              <option value={{$info->status}}>{{$info->status}}</option>
                @endforeach 
            </select>
          </div>
              
             <button class="btn-search" style="vertical-align: middle"><span>Search</span></button></a>
         </form>
      <div class="text-right margin">
        <a href='../add_car_management'><button class="btn-add" style="vertical-align: middle"><span>เพิ่มตู้รถไฟ</span></button></a>
      </div>      
    <!--Second Container-->
      <!--Table Detail-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>รหัสตู้รถไฟ</th>
                <th>โมเดล</th>
                <th>ชนิด</th>
                <th>สถานะ</th>
                <th style="color: #f4511e;">แก้ไข</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($cars_info as $info)
              <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->model}}</td>                
                <td>{{$info->cars_type}}</td>            
                <td>{{$info->status}}</td>
                <td><a href='/edit_cars_management/{{$info->id}}'><img src="image/edit_orange.png" onmouseover="this.src='image/edit_yellow.png'" onmouseout="this.src='image/edit_orange.png'"></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$cars_info->links()}} 
        </div>      
    </div>

    
  <!--Footer-->

</body>
</html>

