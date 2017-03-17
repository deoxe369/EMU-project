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
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li class="active"><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
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
        <form class="form-inline" action="search_maintenance">

          <div class="form-group">
            <label for="trsettype"><h3 class="margin label-padding">รหัสชุดรถไฟ</h3></label>
            <select id="train_number" name="train_number" class="sel sel-3">
              <option value="not">เลือกรหัสชุดรถไฟ</option>
               @foreach ($maintenance_info as $info)
              <option value={{$info->train_number}}>{{$info->train_number}}</option>
                @endforeach        
            </select>
          </div>

          <div class="form-group">
            <label for="trstatus"><h3 class="margin label-padding">ศูนย์ซ่อม</h3></label>
            <select id="depot" name="depot" class="sel sel-3">
              <option value="not">เลือกศูนย์ซ่อมบำรุง</option>
              @foreach ($maintenance_info as $info)
              <option value={{$info->depot}}>{{$info->depot}}</option>
                @endforeach        
            </select>
          </div>

          <div class="form-group">
            <label for="search"><h3 class="margin label-padding"><span></span></h3></label>
            <button type="submit" value="Search" class="btn-search"><span>Search</span></button>

            <label for="addmaint"><h3 class="margin label-padding"></h3></label>
            <button formaction="../add_maintenance_management" class="btn-add" style="vertical-align: middle"><span>เพิ่มใบเข้าซ่อม</span></button>

            <!--add page: delete maintenance_management-->
            <label for="delmaint"><h3 class="margin label-padding"></h3></label>
            <button formaction="../delete_maintenance" class="btn-del" style="vertical-align: middle"><span>ลบใบเข้าซ่อม</span></button>
          </div>
        </form>
      </div>

    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>เลขเข้าซ่อม</th>
                <th>รหัสชุดรถไฟ</th>
                <th>ศูนย์ซ่อม</th>
                <th>ระดับ</th>
                <th>วันเวลาเข้า</th>
                <th>วันเวลาออก</th>
                <th style="color: #f4511e;">แก้ไข</th>
                <th style="color: #006064;">Checklists</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($maintenance_info as $info)
              <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->train_number}}</td>
                <td>{{$info->depot}}</td>
                <td>{{$info->level}}</td>
                <td>{{$info->in_date}}</td>
                <td>{{$info->out_date}}</td>
                <td><a href='../edit_maintenance/{{$info->id}}'><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
                <td><a href='../checklist_maintenance/{{$info->id}}'><img src="image/icon/checklist_green.png" onmouseover="this.src='image/icon/checklist_yellow.png'" onmouseout="this.src='image/icon/checklist_green.png'"></a></td>
              </tr>
               @endforeach
            </tbody>
          </table>
          {{ $maintenance_info->links()}}
        </div> 
      </div>     
    </div>

    
  <!--Footer-->

</body>
</html>