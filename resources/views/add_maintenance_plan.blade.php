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
    <div class="container-fluid">
   
 
    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">
        <form action="/add_maintenance_plan/show">
        <button type="submit" value="Save" class="btn-save"><span>ตกลง</span></button>
          <table class="table">
            <thead>
              <tr>
               <th></th>
               <th></th>
                <th>รหัสชุดรถไฟ</th>
                <th>ชนิด</th>
                <th>ระยะทางสะสม</th>
                <th>ระยะเวลาสะสม</th>
                <th>สถานะ</th>
                <th>ตำแหน่งงปัจุบัน</th>
                <th>ศูนย์ซ่อม</th>
                <th>วันเข้าซ่อม</th>

                <!-- <th style="color: #f4511e;">แก้ไข</th> -->
              </tr>
            </thead>
            <tbody>
            
           
          @for ($i = 0; $i < $number ; $i++)
  
            <tr>
              
                <td><input type="checkbox" id="{{$trainset_info[$i]->train_number}}2" checked name="trainsetno" value={{$trainset_info[$i]->train_number}} ></td>

                <td><input type="checkbox" id="{{$trainset_info[$i]->level}}{{$trainset_info[$i]->train_number}}" checked name="level" value={{$trainset_info[$i]->level}} ></td>

               
               
                <td>{{$trainset_info[$i]->train_number}}</td>
                <td id="{{$trainset_info[$i]->train_number}}1" >{{$trainset_info[$i]->type}}</td>
              <script type="text/javascript">
                document.getElementById("{{$trainset_info[$i]->train_number}}2").style.display = "none";
                document.getElementById("{{$trainset_info[$i]->level}}{{$trainset_info[$i]->train_number}}").style.display = "none";
                
                var trtype = document.getElementById("{{$trainset_info[$i]->train_number}}1").innerHTML;
               
               switch(trtype){
                  case "trcar3": document.getElementById("{{$trainset_info[$i]->train_number}}1").innerHTML= 'ชุดรถไฟโดยสาร 3';break;
                  case "trcar4": document.getElementById("{{$trainset_info[$i]->train_number}}1").innerHTML= 'ชุดรถไฟโดยสาร 4'; break;
                }
                
              </script>        
                <td>{{$trainset_info[$i]->total_distance}}</td>
                <td>{{$trainset_info[$i]->total_time}}</td>                
                <td>{{$trainset_info[$i]->status}}</td>
                <td id="{{$i}}location" title="{{$train_schedule[$i]->source_station}}">
                </td>
                 <a id="{{$i}}location1" title="{{$train_schedule[$i]->destination_station}}"></a>  
                

                <td><select class="sel" name="depotno">
                  <option value="">เลือกศูนย์ซ่อม</option>
                    @foreach ($depot_info as $info1)
                      <option id="{{$info1->id}}{{$trainset_info[$i]->train_number}}" value="{{$info1->id}}" label={{$info1->location_name}}>{{$info1->level}}</option>

                          <script type="text/javascript">
                          var a = {{$info1->level}};
                          
                          // console.log(a);
                          var b = {{$trainset_info[$i]->level}};
                           // console.log(b); 

                           if(a >= b){
                              
                              // console.log('ใด้');
                           }else{
                              document.getElementById("{{$info1->id}}{{$trainset_info[$i]->train_number}}").style.display ="none";
                              // console.log('ไม่ได้');
                           }


                          </script>
                        
                    @endforeach 
                    </select></td>

            
                <td><select class="sel" name="endate" id="{{$i}}train" onchange=" getSelectedOptions(this,this.id)">
                <option id="{{$maintenance_date[$i]}}1"  ></option>
                <option id="{{$maintenance_date[$i]}}"" value="{{$maintenance_date[$i]}}" label={{$maintenance_date[$i]}} selected=""></option>
                <option id="{{$maintenance_date[$i]}}2"  ></option>
                   <script type="text/javascript">
                          var maintenance_d = "{{$maintenance_date[$i]}}";

                          var yesterday = new Date(maintenance_d);
                          yesterday.setDate(yesterday.getDate() - 1);
                          var yesterday1 = yesterday.toISOString().substring(0, 10)

                          var tomorrow = new Date(maintenance_d);
                          tomorrow.setDate(tomorrow.getDate() + 1);
                          var tomorrow1 = tomorrow.toISOString().substring(0, 10);

                          document.getElementById("{{$maintenance_date[$i]}}1").label = yesterday1;
                          document.getElementById("{{$maintenance_date[$i]}}2").label = tomorrow1;
                          document.getElementById("{{$maintenance_date[$i]}}1").value = yesterday1;
                          document.getElementById("{{$maintenance_date[$i]}}2").value = tomorrow1;
                                // console.log(source);
                                      var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                                       var secondDate = new Date(2016,01,1);

                                      var firstDate = new Date(maintenance_d);
                                      var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
                                      var mod = diffDays%2;
                                      switch(mod){
                                      case 0: document.getElementById("{{$i}}location").innerHTML=document.getElementById("{{$i}}location").title;
                                      break;
                                      case 1: document.getElementById("{{$i}}location").innerHTML=document.getElementById("{{$i}}location1").title;
                                      break;
                                         }
                          


                          function getSelectedOptions(sel,train_number){
                                var opts = [],
                                  opt;
                                var len = len = sel.options.length;
                                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                                var secondDate = new Date(2016,01,1);
                                var number = train_number.substr(0,train_number.length-5);
                                var s = `${number}location`;
                                var s1 = `${number}location1`;
                                var source = document.getElementById(s).title;
                                var destination = document.getElementById(s1).title;
                                // console.log(source);
                                // console.log(destination);
                              

                              // console.log(source8);
                            
                                for (var i = 0; i < len; i++) {
                                  opt = sel.options[i];
                                  // console.log("k");
                                  if (opt.selected) {
                                    opts.push(opt);
                                    opt.value

                                      var firstDate = new Date(opt.value);
                                      var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
                                      var mod = diffDays%2;
                                      switch(mod){
                                      case 0: document.getElementById(s).innerHTML=source;
                                      break;
                                      case 1: document.getElementById(s).innerHTML=destination;
                                      break;
                                         }
                                         
                                     
                                }

              
                                 }

                                return opt.value;

                              }
// ----------------------------------------
                               

                                         
                                     
                                
                    </script>
                </select><td>
              </tr>
                
              @endfor
           
              
           
            </tbody>
          </table>
          </form>
        </div>
      </div>      
    </div>


   
  <!--Footer-->
</body>
</html>