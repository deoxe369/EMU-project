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
            <li class="active"><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
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
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">เพิ่มข้อมูลชุดรถไฟ</h1>

        <br>

        <!--Form Add-->
       <form class="form-horizontal" action="add_trainset" name="chktrset"  >
          
          <!--New Structure: Table-->
          <table class="table-add" align="center">

            <!-- No.Train Set -->
            <tr class="tr-add">
              <td class="td-add"><label for="trainsetno">รหัสชุดรถไฟ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!--Input No.Train Set-->
              <td>
                <input type="text" name="trainsetno">              
                <span id="chktrset_no" class="checkform"></span>
              </td>
            </tr>

            <!-- Trainset Type -->
            <tr class="tr-add">
              <td class="td-add"><label for="trtype">ประเภท</label></td>
              <td class="col-sm-1"><span></span></td>
              <!--Choose Trainset Type-->
              <td>
                <select id="trtype" name="trtype" onchange=" getSelectedOptions(this)" class="sel">
                  <option value=" ">เลือกประเภทของชุดรถไฟ</option>
                  <option value="passenger">ชุดรถไฟโดยสาร</option>
            <!--  <option value="trgoods">ชุดรถไฟขนส่ง</option>
                  <option value="trtrolley">รถรางโยก</option> -->
                </select>
                <span id="chktrset_type" class="checkform"></span>
              </td>
            </tr>

            <!-- Composition -->
            <tr class="tr-add">
              <td class="td-add"><label for="trtype">เลือก COMPOSITION</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Button Add Composition -->
              <td id="composition">
                <button onclick="addRow(this.form);" type="button" value="Add composition" class="btn-add" style="vertical-align: middle"">Add composition</button>
              </td>
            </tr>

            <tr>
              <td class="col-sm-1"><span></span></td>
              <td class="col-sm-1"><span></span></td>
              <td id="composition">
                <!-- Call from Javascript Composition -->
                    <div id="KK">
                    <select name="cars_id" class="sel">
                      @foreach($cars_loco_info as $loco)
                      <option value={{$loco->id}}>{{$loco->id}}</option>
                      @endforeach
                    </select>
                    <select name="cars_id" class="sel">
                      @foreach($cars_bogie_info as $bogie)
                      <option value={{$bogie->id}}>{{$bogie->id}}</option>
                      @endforeach
                    </select>
                    </div>
              </td>
            </tr>

            <!-- Select-Options are added by Button Add Composition -->
            <tr>
              <td class="col-sm-1"><span></span></td>
              <td class="col-sm-1"><span></span></td>
              <td>
                <!-- Call from Javascript Composition -->
                <div id="itemRows"></div>
              </td>
            </tr>

            <!-- Composition original
            <tr class="tr-add" id="composition" >
              <td class="td-add"><label for="trtype">เลือก COMPOSITION</label></td>
              <td class="col-sm-1"><span></span></td>
              Button Add Composition
              <td>
                <button onclick="addRow(this.form);" type="button" value="Add composition" class="btn-add" style="vertical-align: middle"">Add composition</button>
                    <select name="cars_id" class="sel">
                      @foreach($cars_loco_info as $loco)
                      <option value={{$loco->id}}>{{$loco->id}}</option>
                      @endforeach
                    </select>
                    <select name="cars_id" class="sel">
                      @foreach($cars_bogie_info as $bogie)
                      <option value={{$bogie->id}}>{{$bogie->id}}</option>
                      @endforeach
                    </select>
                    <div id="itemRows"></div>
                </td>
            </tr> -->

          </table>
            
            <!-- Javascript Composition -->
            <script type="text/javascript">
              // Create Select Composition
              document.getElementById("composition").style.display = "none";
              var rowNum = 0;
              function addRow(frm) {
                rowNum ++;
                var row = '<a id="rowNum'+rowNum+'"> <select name="cars_id" class="sel sel-comp">@foreach($cars_bogie_info as $bogie)<option value={{$bogie->id}}>{{$bogie->id}}</option>@endforeach</select> <input type="button" value="&#8722;" class="btn-del-comp" onclick="removeRow('+rowNum+');"></a>';
                jQuery('#itemRows').after(row);
                frm.cars_id.value = '';
                console.log( document.getElementById("composition"));
              }
              
              // Remove Composition
              function removeRow(rnum) {
                jQuery('#rowNum'+rnum).remove();
                console.log( rowNum);
              }

              // Select Trainsettype
              function getSelectedOptions(sel){
                var opts = [], opt;
                var len = len = sel.options.length;
                for (var i = 0; i < len; i++) {
                  opt = sel.options[i];
                  // console.log("k");
                  if (opt.selected) {
                    opts.push(opt);
                    console.log(opt.value);
                    switch(opt.value){
                      case "passenger": 
                        document.getElementById("composition").style.display = "block"; 
                           
                        break;
                      case " ": 
                        document.getElementById("composition").style.display = "none";       
                        break;
                      }
                    }
                  }
                 return opt.value;
              }
  
            </script>
            
           <br>
           
           <div  style="text-align: center;">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button type="button" value="Cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
          </div>
        </form>
        
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>