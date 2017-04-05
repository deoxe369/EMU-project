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
      <div class="row col-md-12 margin">
        <form class="form-inline" action="search_depot">

         <!--  <div class="form-group">
            <label for="search"><h3 class="margin">&nbsp;</h3></label>    
            <button class="btn-search" style="vertical-align: middle"><span>Search</span></button>

            <label for="adddepot"><h3 class="margin">&nbsp;</h3></label>
            <button formaction="../add_depot_management" class="btn-add" style="vertical-align: middle"><span>เพิ่มศูนย์ซ่อม</span></button>

            add page: delete part_management
            <label for="deldepot"><h3 class="margin">&nbsp;</h3></label>
            <button formaction="../add_depot_management" class="btn-del" style="vertical-align: middle"><span>ลบศูนย์ซ่อม</span></button>
          </div> -->
        </form>
      </div>
           
    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">
          <form action="delete_depot">
            <button type="submit" value="Save" class="btn-save"><span>ตกลง</span></button>
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center th-edit">เลือก</th>
                  <th class="text-center">รหัสศูนย์</th>
                  <th class="text-center">จำนวนที่รับได้</th>
                  <th class="text-center">ตำแหน่ง</th>
                  <th class="text-center">ว่าง</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($depot_info as $info)
                <tr id="{{$info->id}}">
                  <td class="text-center"><input type="checkbox" name='choose' value={{$info->id}}></td>
                  <td class="text-center">{{$info->id}}</td>
                  <td class="text-center">{{$info->capacity}}</td>
                  <td class="text-center">{{$info->location_name}}</td>
                  <td class="text-center">{{$info->free_slot}}</td>
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

                </script>

                @endforeach
              </tbody>
            </table>
          </form>          
        </div> 
      </div>
      {{$depot_info->links()}}     
    </div>

    
  <!--Footer-->

</body>
</html>