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
            <li class="dropdown normal">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การใช้ชุดรถไฟ<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='../traincirculation_plan'>ระบบจัดการแผนใช้ชุดรถไฟ</a></li>
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
    <h1 class="margin" style="text-align: center;">จัดการตู้รถไฟ</h1>
      
    <br>

    <div class="row col-md-12 margin text-center">
      <form class="form-inline bg-5" action="search_cars">

          <div class="form-group">
            <label for="cars_type"><h3 class="margin label-padding">ประเภท</h3></label>
            <select id="cars_type" name="cars_type" class="sel sel-3">
              <option value='not'>เลือกประเภทตู้รถไฟ</option> 
              <option value="locomotive">โดยสารประเภทขับเคลื่อนได้</option>
              <option value="bogie">โดยสารประเภทขับเคลือนไม่ได้</option>
              <option value="logistic">ขนส่ง</option>
            </select>
          </div>

          <div class="form-group">
            <label for="cars_model"><h3 class="margin label-padding">โมเดล</h3></label>
            <select id="cars_model" name="cars_model" class="sel sel-3">
              <option value='not'>เลือกโมเดลตู้รถไฟ</option>           
                 @foreach ($cars_model_info as $info)
              <option value={{$info->model}}>{{$info->model}}</option>
                @endforeach 
            </select>   
          </div>

          <div class="form-group">
            <label for="status"><h3 class="margin label-padding">สถานะ</h3></label>
            <select id="status" name="status" class="sel sel-3">
              <option value='not'>สถานะตู้รถไฟ</option> 
                @foreach ($cars_status_info as $info)
              <option value={{$info->status}}>{{$info->status}}</option>
                @endforeach 
            </select>
          </div>
          
          <div class="form-group">
            <label for="search"><h3 class="margin label-padding"><span></span></h3></label>
            <button class="btn-search" style="vertical-align: middle"><span>Search</span></button></a>
          </div>
      </form>
    </div>


    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <!-- Button -->
        <div class="text-right">
          <a href="../add_car_management"><button class="btn-add" style="vertical-align: middle"><span>เพิ่มตู้รถไฟ</span></button></a>
          <a href="../delete_cars_management"><button class="btn-del" style="vertical-align: middle"><span>ลบตู้รถไฟ</span></button></a>
        </div>

        <div class="table-responsive">
          <table class="table" id="mytable">
            <thead>
              <tr>
                <th class="text-center">รหัสตู้รถไฟ</th>
                <th class="text-center">โมเดล</th>
                <th class="text-center">ชนิด</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center th-edit">แก้ไข</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($cars_info as $info)
              <tr id='{{$info->id}}'>
                <td class="text-center">{{$info->id}}</td>
                <td class="text-center">{{$info->model}}</td>                
                <td class="text-center" id = "{{$info->id}}cartype">{{$info->cars_type}}</td>
                <td class="text-center">{{$info->status}}</td>
                <!-- <td class="text-center" id="{{$info->id}}editcar"><a href='/edit_cars_management/{{$info->id}}'><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td> -->
                <td class="text-center" id="{{$info->id}}editcar"><a href='/edit_cars_management/{{$info->id}}'><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <!-- JavaScript Foreach -->
                <script type="text/javascript">
                  //row color
                  /*var id = parseInt(document.getElementById("{{$info->id}}").id);
                
                  if(id%2 == 1){
                    document.getElementById("{{$info->id}}").style.backgroundColor = "#ffffff";
                    console.log(id);
                  }else{
                    document.getElementById("{{$info->id}}").style.backgroundColor = "#F5F5F5";
                    console.log(id);
                  }*/

                  //rename
                  var type = document.getElementById('{{$info->id}}cartype').innerHTML
                  if(type == "locomotive"){
                    document.getElementById('{{$info->id}}cartype').innerHTML = "โดยสารประเภทขับเคลื่อนได้"
                  }else if (type == "bogie"){
                    document.getElementById('{{$info->id}}cartype').innerHTML = "โดยสารประเภทขับเคลื่อนไม่ได้"
                  }else{
                    document.getElementById('{{$info->id}}cartype').innerHTML = "ขนส่ง"
                  }

                </script>

              @endforeach
            </tbody>
          </table>          
        </div> 
      </div>

      <!-- Pagination -->
      <div class="text-center">{{$cars_info->links()}}</div> 

    </div>
    
  <!--Footer-->
  <footer class="bg-2">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>

