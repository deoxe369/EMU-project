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
  <div class="content">
    <div class="container-fluid">
      <h1 class="margin" style="text-align: center;">ตรวจสอบสภาพชุดรถไฟ</h1>

      <br>

    <!--Second Container-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">
          <form action="/checklist_maintenance/{{$id}}/save">

            <!-- Button -->
            <div class="text-right">
              <!-- <button type="submit" value="" class="btn-save"><span>เปลี่ยนอ่ะไหล่</span></button> -->
              <a href='/choose_cars/{{$id}}'><button type="button" class="btn-add" onclick="">สภาพอะไหล่</button></a>
              <button type="submit" value="Save" class="btn-save"><span>ตกลง</span></button>
            </div>
            

            <!--Table: Checklist-->
            <table class="table" id="mytable">
              <thead>
                <tr>
                  <th class="text-center th-edit col-sm-1"><span></span></th>
                  <th class="text-center th-edit">รายการ</th>
                  <th class="text-center">ผ่าน </th>
                  <th class="text-center">ไม่ผ่าน</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                @foreach ($checklist_info as $info)
                  <td class="text-center col-sm-1"><input type="checkbox" id="{{$info->id}}" checked name="checklist" value={{$info->id}} ></td>
                    <!-- Javascript: Not Display Checkbox which send value -->
                    <script type="text/javascript">
                      document.getElementById("{{$info->id}}").style.display = "none";
                    </script> 
                  <td class="text-left">{{$info->checklist}}</td>
                  <td class="text-center"><input type="checkbox" name="checked" value=yes></td>
                  <td class="text-center"><input type="checkbox" name="checked" value=no></td>
                </tr>

                <!-- Javascript -->
                <script>
                  document.getElementById("kri").innerHTML = "1";
                </script>
                @endforeach
              </tbody>
            </table>
          </form>
        </div>      
      </div>

      <!-- Pagination -->
      <div class="text-center">{{ $checklist_info->links()}}</div>

    </div>
  </div>
   
  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>
  
</body>
</html>