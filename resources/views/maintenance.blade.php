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
      <div class="row col-md-12 margin text-center">
        <form class="form-inline bg-5" action="search_maintenance">

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
          </div>
        </form>
      </div>

    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <!-- Button -->
        <div class="text-right">
          <a href="../add_maintenance_management"><button class="btn-add" style="vertical-align: middle"><span>เพิ่มใบเข้าซ่อม</span></button></a>
          <a href="../delete_maintenance"><button class="btn-del" style="vertical-align: middle"><span>ลบใบเข้าซ่อม</span></button></a>
        </div>

        <div class="table-responsive">
          <table class="table" id="mytable">
            <thead>
              <tr>
                <th class="text-center">เลขเข้าซ่อม</th>
                <th class="text-center">รหัสชุดรถไฟ</th>
                <th class="text-center">ศูนย์ซ่อม</th>
                <th class="text-center">ระดับ</th>
                <th class="text-center">วันเวลาเข้า</th>
                <th class="text-center">วันเวลาออก</th>
                <th class="text-center th-edit">แก้ไข</th>
                <th class="text-center th-edit">Checklists</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($maintenance_info as $info)
              <tr id="{{$info->id}}">
                <td class="text-center">{{$info->id}}</td>
                <td class="text-center">{{$info->train_number}}</td>
                <td class="text-center">{{$info->depot}}</td>
                <td class="text-center">{{$info->level}}</td>
                <td class="text-center">{{$info->in_date}}</td>
                <td class="text-center">{{$info->out_date}}</td>
                <td class="text-center"><a href='../edit_maintenance/{{$info->id}}'><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
                <td class="text-center"><a href='../checklist_maintenance/{{$info->id}}'><img src="image/icon/checklist_green.png" onmouseover="this.src='image/icon/checklist_yellow.png'" onmouseout="this.src='image/icon/checklist_green.png'"></a></td>
              </tr>
              <!-- JavaScript Foreach -->
                <!-- <script type="text/javascript">
                  //row color
                  var id = parseInt(document.getElementById("{{$info->id}}").id);
                
                  if(id%2 == 1){
                    document.getElementById("{{$info->id}}").style.backgroundColor = "#ffffff";
                    console.log(id);
                  }else{
                    document.getElementById("{{$info->id}}").style.backgroundColor = "#F5F5F5";
                    console.log(id);
                  }

                </script> -->

              @endforeach
               
            </tbody>
          </table>
        </div> 
      </div>

      <!-- Pagination -->
      <div class="text-center">{{ $maintenance_info->links()}}</div>

    </div>

    
  <!--Footer-->

</body>
</html>