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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
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
      <div class="row col-md-12 margin">
        <form class="form-inline" action="search_cars">

          <div class="form-group">
            <label for="cars_type"><h3 class="margin">ประเภท</h3></label>
            <select id="cars_type" name="cars_type" class="sel sel-3">
              <option value='not'>ประเภท</option> 
              <option value="locamotive">โดยสารประเภทขับเคลื่อนได้</option>
              <option value="bogie">โดยสารประเภทขับเคลือนไม่ได้</option>
              <option value="logistic">ขนส่ง</option>
                       
            </select>
          </div>

          <div class="form-group">
            <label for="cars_model"><h3 class="margin">โมเดล</h3></label>
            <select id="cars_model" name="cars_model" class="sel sel-3">
              <option value='not'>โมเดล</option>           
                 @foreach ($cars_model_info as $info)
              <option value={{$info->model}}>{{$info->model}}</option>
                @endforeach 
            </select>   
          </div>

          <div class="form-group">
            <label for="status"><h3 class="margin">สถานะ</h3></label>
            <select id="status" name="status" class="sel sel-3">
              <option value='not'>สถานะ</option> 
                @foreach ($cars_status_info as $info)
              <option value={{$info->status}}>{{$info->status}}</option>
                @endforeach 
            </select>
          </div>
          
          <div class="form-group">
            <label for="search"><h3 class="margin">&nbsp;</h3></label>
            <button class="btn-search" style="vertical-align: middle"><span>Search</span></button></a>
          <!-- 
            <label for="addcar"><h3 class="margin">&nbsp</h3></label>
            <button formaction="../add_car_management" class="btn-add" style="vertical-align: middle"><span>เพิ่มตู้รถไฟ</span></button>

             add page: delete trainset_management
            <label for="delcar"><h3 class="margin">&nbsp</h3></label>
            <button formaction="../delete_car_management" class="btn-del" style="vertical-align: middle"><span>ลบตู้รถไฟ</span></button> -->
          </div>
        </form>
      </div>  


    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">
          <form action="delete_cars">
            <button type="submit" value="Save" class="btn-save"><span>ตกลง</span></button>
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center th-edit">เลือก</th>
                  <th class="text-center">รหัสตู้รถไฟ</th>
                  <th class="text-center">โมเดล</th>
                  <th class="text-center">ชนิด</th>
                  <th class="text-center">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($cars_info as $info)
                <tr id="{{$info->id}}">
                  <td class="text-center"><input type="checkbox" name='choose' value={{$info->id}}></td>
                  <td class="text-center">{{$info->id}}</td>
                  <td class="text-center">{{$info->model}}</td>                
                  <td class="text-center" id="{{$info->id}}cartype">{{$info->cars_type}}</td>            
                  <td class="text-center">{{$info->status}}</td>
                </tr>

                <!-- JavaScript Foreach -->
                <script type="text/javascript">
                  //row color
                  var id = parseInt(document.getElementById("{{$info->id}}").id);
                
                  if(id%2 == 1){
                    document.getElementById("{{$info->id}}").style.backgroundColor = "#ffffff";
                    console.log(id);
                  }else{
                    document.getElementById("{{$info->id}}").style.backgroundColor = "#F5F5F5";
                    console.log(id);
                  }

                  //rename
                  var type = document.getElementById('{{$info->id}}cartype').innerHTML
                  if(type == "locomotive"){
                    document.getElementById('{{$info->id}}cartype').innerHTML = "โดยสารประเภทขับเคลื่อนได้"
                  }else{
                    document.getElementById('{{$info->id}}cartype').innerHTML = "โดยสารประเภทขับเคลื่อนไม่ได้"
                  }

                </script>

                @endforeach
              </tbody>
            </table>
          </form>
          {{$cars_info->links()}} 
        </div>
      </div>  
    </div>

    
  <!--Footer-->

</body>
</html>

