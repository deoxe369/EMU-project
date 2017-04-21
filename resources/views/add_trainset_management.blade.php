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
  <div class="content">
    <div class="container-fluid">    
    <!--First Container-->
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">เพิ่มข้อมูลชุดรถไฟ</h1>

        <br>

        <!--Form Add-->
       <form class="form-horizontal" action="add_trainset" name="chktrset" onsubmit="return trset()">
          
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
                  <option value=" ">-- เลือกประเภทของชุดรถไฟ --</option>
                  <option value="passenger">ชุดรถไฟโดยสาร</option>
                  <!-- <option value="trgoods">ชุดรถไฟขนส่ง</option>
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
                <button onclick="addRow(this.form);" type="button" value="Add composition" class="btn-add" style="vertical-align: middle">Add composition</button>
              </td>
            </tr>
          </table>

          <!-- Display Select Composition -->
          <div class="margin-top" id="locobofirst">
            <div class="table-responsive">
              <table class="table-add1" align="center" style="border-collapse: collapse;">
                <tbody>
                  <tr class="bg-7">
                    <td colspan="3" class="text-center"><span id="chktrset_carid" class="checkform" style="color: #333;">เลือกรหัสตู้รถไฟ</span></td>
                  </tr>
                  <tr style="border-top: 3px solid #ffffff !important;">
                    <td class="text-center th-edit"><p class="td-carname">Locomative</p></td>
                    <td class="col-sm-1 bg-7"><span></span></td>
                    <td class="bg-7">
                      <!-- Call from Javascript Composition: Locomative -->
                      <select name="cars_id" class="sel sel-comp">
                        <option value=" ">-- เลือก --</option>
                        @foreach($cars_loco_info as $loco)
                          <option value={{$loco->id}}>{{$loco->id}}</option>
                        @endforeach
                      </select>
                      <!-- <span id="chktrset_carid" class="checkform"></span> -->
                    </td>
                  </tr>

                  <tr style="border-top: 3px solid #ffffff !important;">
                    <td class="text-center th-bo"><p class="td-carname">Bogie 1</p></td>
                    <td class="col-sm-1 bg-7"><span></span></td>
                    <td class="bg-7">
                      <!-- Call from Javascript Composition: Bogie1 -->
                      <select name="cars_id" class="sel sel-comp">
                        <option value=" ">-- เลือก --</option>
                        @foreach($cars_bogie_info as $bogie)
                          <option value={{$bogie->id}}>{{$bogie->id}}</option>
                        @endforeach
                      </select>
                      <!-- <span id="chktrset_carid" class="checkform"></span> -->                
                    </td>
                  </tr>                  
                </tbody>

                <!-- Add Input Car Row -->
                <tbody id="itemRows"></tbody>

              </table>
            </div>
          </div>

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
              
              // Start Display Button Add Composition
              document.getElementById("composition").style.display = "none";
              document.getElementById("locobofirst").style.display = "none";
              
              // Create Select Composition
              var rowNum = 0;
              
              function addRow(frm) {
                rowNum ++;
                var bogieNum = rowNum+1;
                var row = '<tr id="rowNum'+rowNum+'" style="border-top: 3px solid #ffffff !important;"><td class="text-center th-bo"><p class="td-carname">Bogie '+bogieNum+'</p></td><td class="col-sm-1 bg-7"><span></span></td><td class="bg-7"><select name="cars_id" class="sel sel-comp"><option value=" ">-- เลือก --</option>@foreach($cars_bogie_info as $bogie)<option value={{$bogie->id}}>{{$bogie->id}}</option>@endforeach</select><input type="button" value="&#9866;" class="btn-del-comp" onclick="removeRow('+rowNum+');"></td></tr>';
                jQuery('#itemRows').before(row);
                //frm.cars_id.value = ' ';
                // console.log( document.getElementById("composition"));
                // console.log( bogieNum);
              }
              
              // Remove Composition
              function removeRow(rnum) {
                rowNum --;
                jQuery('#rowNum'+rnum).remove();
                
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
                        document.getElementById("locobofirst").style.display = "block";
                        break;
                      case " ": 
                        document.getElementById("composition").style.display = "none";
                        document.getElementById("locobofirst").style.display = "none";
                        document.getElementById("selcomp").style.display = "block";          
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
  </div>

  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>