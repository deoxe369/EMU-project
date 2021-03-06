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
      <!--First Container-->
      <h1 class="margin" style="text-align: center;">ระบบจัดการแผนเข้าซ่อม</h1>
      
      <br>

      <div class="row col-md-12 margin text-center">
        <form class="form-inline bg-5" action="search_train_set1">

          <div class="form-group">
            <label for="trainsetno"><h3 class="margin label-padding">รหัสชุดรถไฟ</h3></label>
            <input type="text" name="trainsetno" class="sel-3">
          </div>

          <div class="form-group">
            <label for="trsettype"><h3 class="margin label-padding">ประเภท</h3></label>
            <select id="trsettype" name="trsettype" class="sel sel-3">
              <option value='not'>เลือกประเภทชุดรถไฟ</option>
              <option value="passenger">ชุดรถไฟโดยสาร</option>
              <!-- <option value="trcar4">ชุดรถไฟโดยสาร 4</option> -->
          <!--  <option value="trgoods">ชุดรถไฟขนส่ง</option>
                <option value="trtrolley">รถรางโยก</option> -->
            </select>
          </div>

          <div class="form-group">
            <label for="trstatus"><h3 class="margin label-padding">สถานะ</h3></label>
            <select id="trstatus" name="trstatus" class="sel sel-3">
              <option value='not'>เลือกสถานะชุดรถไฟ</option>
              <option value="ไม่ว่าง">ไม่ว่าง</option>
              <option value="ว่าง">ว่าง</option>
              <!-- <option value="ซ่อม">ซ่อม</option> -->
            </select>
          </div>

          <div class="form-group">
            <label for="search"><h3 class="margin"><span></span></h3></label>
            <button type="submit" value="Search" class="btn-search"><span>Search</span></button>
            <button formaction="../create_maintenance_plan" class="btn-add" ><span>สร้างแผนเข้าซ่อมอัตโนมัติ</span></button>
          </div>
        </form> 
      </div>
    
                     
         
      <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
     
      <form action="/add_maintenance_plan" name="chkmaintpl" onsubmit="return maintpl()">
        <!-- Button -->
        <div class = "text-right">
          <button type="reset" value="reset" class="btn-cancel" style="vertical-align: middle" ><span>รีเซต</span></button>
          <button type="submit" value="Save" class="btn-save" style="vertical-align: middle" ><span>สร้างแผนเข้าซ่อมเอง</span></button>
        </div>
       
        <span id="chkmaintpl_choose" class="checkform"></span>

        <div class="table-responsive">  
          <table class="table" id="mytable">
            <thead>
              <tr>
                <th class="text-center th-edit">เลือก</th>
                <th class="text-center">รหัสชุดรถไฟ</th>
                <th class="text-center">ประเภท</th>
                <th class="text-center">ระยะทางสะสม (km)</th>
                <th class="text-center">ระยะเวลาสะสม </th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">วันซ่อม</th>
              </tr>
            </thead>

            <tbody id="itemRows">
              @foreach ($trainset_info as $key=>$info)
              <tr id="{{$info->train_number}}" value ="{{$info->level}}">  
                <td class="text-center"><input type="checkbox" name="choose" value={{$info->train_number}}></td>
                <td class="text-center">{{$info->train_number}}</td>
                <td class="text-center" id="{{$info->train_number}}type">{{$info->type}}</td>        
                <td class="text-center" id="total_dist{{$info->train_number}}">{{$info->total_distance}}</td>
                <td class="text-center" id="total_time{{$info->train_number}}">{{$info->total_time}}</td>
                <td class="text-center">{{$info->status}}</td>
                <td class="text-center" id='md{{$info->train_number}}'>{{$maintenance_date[$key]}}</td>
                <a class="text-center" id="level{{$info->train_number}}">{{$info->level}}</a>
              </tr>

                 @foreach($level_info as $level)
                      
                       <p id="{{$info->train_number}}{{$level->level}}" style="margin:0px; padding: 0px">{{$level->level}}</p>
                       <p id="{{$info->train_number}}{{$level->level}}time" style="margin:0px; padding: 0px">{{$level->total_time}}</p>
                       <p id="{{$info->train_number}}{{$level->level}}dis" style="margin:0px; padding: 0px">{{$level->total_distance}}</p>
                      
                       <script type="text/javascript">
                          var level_info = parseInt(document.getElementById("{{$info->train_number}}{{$level->level}}").innerHTML);
                          var train_level = document.getElementById("level{{$info->train_number}}").innerHTML;
                         if(level_info == train_level){
                            var train_dis =  parseInt(document.getElementById("total_dist{{$info->train_number}}").innerHTML);
                            var train_time =   parseFloat(document.getElementById("total_time{{$info->train_number}}").innerHTML); 
                            var level_dis = parseInt(document.getElementById("{{$info->train_number}}{{$level->level}}dis").innerHTML); 
                            var level_time = parseFloat(document.getElementById("{{$info->train_number}}{{$level->level}}time").innerHTML);  

                            var time_result = level_time-train_time;
                            var dis_result = level_dis-train_dis;
                              if(time_result <= 0.08 || dis_result <= 1000){
                                
                                   document.getElementById("{{$info->train_number}}").style.backgroundColor = "#ff3a3a";

                
                              
                            }else if(time_result <= 0.20 || dis_result <= 3000){
                              
                                document.getElementById("{{$info->train_number}}").style.backgroundColor = "#FFEB3B";
                            }
                          }


                         document.getElementById("{{$info->train_number}}{{$level->level}}").style.display = "none";
                         document.getElementById("{{$info->train_number}}{{$level->level}}time").style.display = "none";
                         document.getElementById("{{$info->train_number}}{{$level->level}}dis").style.display = "none";  
                        document.getElementById("level{{$info->train_number}}").style.display = "none";  

                        // var time = document.getElementById("total_time{{$info->train_number}}").innerHTML;
                       // document.getElementById("total_time{{$info->train_number}}").innerHTML = time*356; 
                      </script> 
                 @endforeach 
                
              <!-- JS change name cartype -->
              <script type="text/javascript">
                // var trtype = document.getElementById("{{$info->train_number}}type").innerHTML;
                // // console.log(trtype);
                // switch(trtype){
                //   case "passenger": document.getElementById("{{$info->train_number}}type").innerHTML= 'ชุดรถไฟโดยสาร';break;
                //   // case "trcar4": document.getElementById("{{$info->train_number}}1").innerHTML= 'ชุดรถไฟโดยสาร 4'; break;
                // }

                var time = document.getElementById("total_time{{$info->train_number}}").innerHTML;
                var year = time-(time%1);
                      var month =  Math.floor((time%1)*365);
                       var month1 = (time%1)*365;
                      var month2 =  Math.floor(month/30);
                      var day = Math.round(month1-month);
                      var total_time = year+" ปี "+month2+" เดือน "+day+" วัน"
                document.getElementById("total_time{{$info->train_number}}").innerHTML = total_time;


                // console.log(today);
                // console.log(document.getElementById("md{{$info->train_number}}").innerHTML);
                
              </script>
              @endforeach

            </tbody>
          </table>
        </div>
      </form>      
      </div>

      @foreach ($trainset_info as $key=>$info)
      <script type="text/javascript">
       var color1 = String(document.getElementById("{{$info->train_number}}").style.backgroundColor);
       if(color1 == "rgb(255, 58, 58)"){
                                document.getElementById("{{$info->train_number}}").hidden = "block";
                                var row = '<tr id="{{$info->train_number}}" value ="{{$info->level}}"><td class="text-center"><input type="checkbox" name="choose" value={{$info->train_number}}></td><td class="text-center">{{$info->train_number}}</td><td class="text-center" id="{{$info->train_number}}type">{{$info->type}}</td><td class="text-center" id="total_dist{{$info->train_number}}">{{$info->total_distance}}</td><td class="text-center" id="total_time{{$info->train_number}}">{{$info->total_time}}</td><td class="text-center">{{$info->status}}</td><td class="text-center" id="md{{$info->train_number}}">{{$maintenance_date[$key]}}</td><a class="text-center" id="level{{$info->train_number}}">{{$info->level}}</a></tr>';
                                jQuery('#{{$trainset_info[0]->train_number}}').before(row);
                                   // console.log(row);
                                document.getElementById("{{$info->train_number}}").style.backgroundColor = "#ff3a3a";
                               
                var time = document.getElementById("total_time{{$info->train_number}}").innerHTML;
                var year = time-(time%1);
                      var month =  Math.floor((time%1)*365);
                       var month1 = (time%1)*365;
                      var month2 =  Math.floor(month/30);
                      var day = Math.round(month1-month);
                      var total_time = year+" ปี "+month2+" เดือน "+day+" วัน"
                document.getElementById("total_time{{$info->train_number}}").innerHTML = total_time;

                
       }
        
      </script>
      @endforeach
      @foreach ($trainset_info as $key=>$info)
      <script type="text/javascript">
       var color1 = String(document.getElementById("{{$info->train_number}}").style.backgroundColor);
       if(color1 == "rgb(255, 235, 59)"){
                                document.getElementById("{{$info->train_number}}").hidden = "block";
                                var row = '<tr id="{{$info->train_number}}" value ="{{$info->level}}"><td class="text-center"><input type="checkbox" name="choose" value={{$info->train_number}}></td><td class="text-center">{{$info->train_number}}</td><td class="text-center" id="{{$info->train_number}}type">{{$info->type}}</td><td class="text-center" id="total_dist{{$info->train_number}}">{{$info->total_distance}}</td><td class="text-center" id="total_time{{$info->train_number}}">{{$info->total_time}}</td><td class="text-center">{{$info->status}}</td><td class="text-center" id="md{{$info->train_number}}">{{$maintenance_date[$key]}}</td><a class="text-center" id="level{{$info->train_number}}">{{$info->level}}</a></tr>';
                                jQuery('#{{$trainset_info[0]->train_number}}').before(row);
                                   // console.log(row);
                                document.getElementById("{{$info->train_number}}").style.backgroundColor = "#FFEB3B";
                                var trtype = document.getElementById("{{$info->train_number}}type").innerHTML;
               
                switch(trtype){
                  case "passenger": document.getElementById("{{$info->train_number}}type").innerHTML= 'ชุดรถไฟโดยสาร';break;
                  // case "trcar4": document.getElementById("{{$info->train_number}}1").innerHTML= 'ชุดรถไฟโดยสาร 4'; break;
                }
                var time = document.getElementById("total_time{{$info->train_number}}").innerHTML;
                var year = time-(time%1);
                      var month =  Math.floor((time%1)*365);
                       var month1 = (time%1)*365;
                      var month2 =  Math.floor(month/30);
                      var day = Math.round(month1-month);
                      var total_time = year+" ปี "+month2+" เดือน "+day+" วัน"
                document.getElementById("total_time{{$info->train_number}}").innerHTML = total_time;
                
       }
                var trtype = document.getElementById("{{$info->train_number}}type").innerHTML;
              
                switch(trtype){
                  case "passenger": document.getElementById("{{$info->train_number}}type").innerHTML= 'ชุดรถไฟโดยสาร';break;
                 
                }
                var currentDate = new Date()
                var day = currentDate.getDate()
                var month = currentDate.getMonth() + 1
                var year = currentDate.getFullYear()
                var today;
                // console.log(month);
                if(month>9){
                  today = year + "-" +month + "-" + day ;
                }else{
                  today = year + "-" + "0"+month + "-" + day; 
                }
                var mdate = document.getElementById("md{{$info->train_number}}").innerHTML;
                // console.log(today);
                if(today == mdate){
                  document.getElementById("md{{$info->train_number}}").innerHTML = "วันนี้";
                      // console.log(document.getElementById("md{{$info->train_number}}").innerHTML);
                }
                // console.log(document.getElementById("md{{$info->train_number}}").innerHTML);

      </script>
      @endforeach
       
        <script language="javascript">   
              var a= document.getElementById('itemRows').rows.length
              var b = 1;
              for(i=0 ; i<a ; i++){
                var color = document.getElementById('itemRows').rows[i].style.backgroundColor;
                if(color == ""){
                  if(b%2==1){
                    document.getElementById('itemRows').rows[i].style.backgroundColor = '#ffffff';
                    b++;
                  }else{
                    document.getElementById('itemRows').rows[i].style.backgroundColor = '#F5F5F5';
                    b++;
                  }
                }
              }
        </script>

        
        <!-- Javascript Table: Row Color -->

<!--  -->
      <!-- Pagination -->
      <div class="text-center">{{$trainset_info->links()}}</div>

    </div>
  </div>
   
  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>