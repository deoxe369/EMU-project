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
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li class="active"><a href='../part_management'>จัดการอะไหล่</a></li>            
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
  <div class="content">
    <div class="container-fluid">    
      <!--First Container-->
      <h1 class="margin" style="text-align: center;">ลบข้อมูลอะไหล่</h1>

      <br>

      <div class="row col-md-12 margin text-center">
        <form class="form-inline bg-5" action="search_part">

          <div class="form-group">
            <label for="part_type"><h3 class="margin">ประเภท</h3></label>
            <select id="part_type" name="part_type" class="sel sel-3">          
              <option value='not'>ประเภท</option> 
                @foreach ($part_type_info as $info)
              <option value={{$info->part_type}}>{{$info->part_type}}</option>
                @endforeach          
            </select>
          </div>

          <div class="form-group">
            <label for="brand"><h3 class="margin">ยี่ห้อ</h3></label>
            <select id="brand" name="brand" class="sel sel-3">
              <option value='not'>ยี่ห้อ</option>           
                @foreach ($part_brand_info as $info)
              <option value={{$info->brand}}>{{$info->brand}}</option>
                @endforeach 
            </select>   
          </div>

          <div class="form-group">
            <label for="part_cars_id"><h3 class="margin">รหัสตู้รถไฟ</h3></label>
            <select id="part_cars_id" name="part_cars_id" class="sel sel-3">
              <option value='not'>Car ID</option> 
                @foreach ($part_cars_info as $info)
              <option value={{$info->cars_id}}>{{$info->cars_id}}</option>
                @endforeach  
            </select>
          </div>
          
          <div class="form-group">
            <label for="search"><h3 class="margin">&nbsp;</h3></label>    
            <button class="btn-search" style="vertical-align: middle"><span>Search</span></button>

            <!-- <label for="addpart"><h3 class="margin">&nbsp</h3></label>
            <button formaction="../add_part_management" class="btn-add" style="vertical-align: middle"><span>เพิ่มอะไหล่</span></button>-->

            <!--add page: delete part_management-->
            <!-- <label for="delpart"><h3 class="margin">&nbsp</h3></label>
            <button formaction="../add_part_management" class="btn-del" style="vertical-align: middle"><span>ลบอะไหล่</span></button> -->
          </div>
        </form>
      </div>

    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <form action="delete_part">
          <!-- Button -->
          <div class="text-right">
            <button type="submit" value="Save" class="btn-save"><span>ตกลง</span></button>
            <button type="reset" value="reset" class="btn-cancel"><span>รีเซต</span></button>
          </div>
          
          <div class="table-responsive">
            <table class="table" id="mytable">
              <thead>
                <tr>
                  <th class="text-center th-edit">เลือก</th>
                  <th class="text-center">รหัสอะไหล่</th>
                  <th class="text-center">ประเภท</th>
                  <th class="text-center">ยี่ห้อ</th>
                  <th class="text-center">เวลาสะสม</th>
                  <th class="text-center">ระยะทางสะสม</th>
                  <th class="text-center">Cars ID</th>
                  <th class="text-center">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($part_info as $info)
                <tr id="{{$info->id}}">
                  <td class="text-center"><input type="checkbox" name='choose' value={{$info->id}}></td>
                  <td class="text-center">{{$info->id}}</td>
                  <td class="text-center">{{$info->part_type}}</td>
                  <td class="text-center">{{$info->brand}}</td>
                  <td class="text-center">{{$info->total_distance}}</td class="text-center">
                  <td class="text-center">{{$info->total_time}}</td>
                  <td class="text-center">{{$info->cars_id}}</td>
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

                </script>

                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>

      <!-- Pagination -->
      <div class="text-center">{{$part_info->links()}}</div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>