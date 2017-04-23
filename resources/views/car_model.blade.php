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
      var a=document.getElementById('locotable');
      var b=document.getElementById('botable');
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

        for(j=0;j<b.rows.length;j++){
        if(j>0){
          if(j%2==1){
            b.rows[j].className="bg-8";
          }else{
            b.rows[j].className="bg-7";
          } 
        }else{ 
        // b.rows[j].className="tr_head"; 
        } 
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
  <div class="content">
    <div class="container-fluid">    
      <!--First Container-->
      <!-- <div class="container"> -->
        <h1 class="margin" style="text-align: center;">เพิ่มโมเดลตู้รถไฟ</h1>

        <br>

        <!-- Form -->
        <form class="form-horizatal" action = "/add_model/save" name="chkcarmd" onsubmit="return carmd()">

          <!-- New Structure: Table -->
          <table class="table-add" align="center">

            <!-- Car Model -->
            <tr class="tr-add">
              <td class="td-add"><label for="cars_model">โมเดล</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Car Model -->
              <td>
                <input type="text" name="cars_model">
                <span id="chkcarmd_carmodel" class="checkform"></span>
              </td>
            </tr>

            <!-- Car Type -->
            <tr class="tr-add">
              <td class="td-add"><label for="cars_type">ชนิดของตู้รถไฟ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Select Car Type -->
              <td>
                <select id="cars_type" name="cars_type" class="sel" onchange=" getSelectedOptions(this)">
                  <option value=" ">เลือกชนิดของตู้รถไฟ</option>
                  <option value="locomotive">โดยสารประเภทขับเคลื่อนได้</option>
                  <option value="bogie">โดยสารประเภทขับเคลือนไม่ได้</option>
                  <!-- <option value="logistic">ขนส่ง</option> -->
                </select>
                <span id="chkcarmd_cartype" class="checkform"></span>
              </td>
            </tr>
          </table>

          <br>

          <!-- Table: Add Locomotive Part Detail -->
          <div class="row col-md-12 margin" id="locomotive">
            <div class="table-responsive">
              <table class="table" id="locotable">
                <thead>
                  <tr>
                    <th class="text-center"><span></span></th>
                    <th class="text-center">อะไหล่</th>
                    <th class="text-center th-edit">ยี่ห้อ</th>
                    <th class="text-center th-edit">รุ่น</th>
                    <th class="text-center th-edit">จำนวน</th>
                    <th class="text-center th-edit"><span></span></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($locomotive as $loco)
                  <tr>
                    <td>
                      <input type="checkbox" name="part_type" value="{{$loco->part_type}}" id="{{$loco->part_type}}lo" checked>
                      <script type="text/javascript">
                        document.getElementById("{{$loco->part_type}}lo").style.display = "none";
                        // console.log(document.getElementById("{{$loco->part_type}}"));
                      </script>
                    </td>
                    <th style="padding-top: 25px; margin-left: 5px;">{{$loco->part_type}}</th>
                    <td class="text-center"><input type="text" name="brand" class="sel sel-3"></td>
                    <td class="text-center"><input type="text" name="code" class="sel sel-3"></td>
                    <td class="text-center"><input type="number" name="qty" class="sel sel-3"></td>
                    <td class="text-center"><span></span></td>
                  </tr>
                  @endforeach
                </tbody>
                <tbody id="itemRows"></tbody>
              </table>              
            </div>
            <button onclick="addRow(this.form);" type="button" value="Add part type" class="btn-add" style="float: right;"><span>เพิ่มประเภทอะไหล่</span></button>
          </div>

          <!-- Table: Add Bogie Part Detail -->
          <div class="row col-md-12 margin" id="bogie">
            <div class="table-responsive">
              <table class="table" id="botable">
                <thead>
                  <tr>
                    <th class="text-center"><span></span></th>
                    <th class="text-center">อะไหล่</th>
                    <th class="text-center th-edit">ยี่ห้อ</th>
                    <th class="text-center th-edit">รุ่น</th>
                    <th class="text-center th-edit">จำนวน</th>
                    <th class="text-center th-edit"><span></span></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($bogie as $bg)
                  <tr>
                    <td>
                      <input type="checkbox" name="part_type" value="{{$bg->part_type}}" id="{{$bg->part_type}}bg" checked>
                      <script type="text/javascript">
                        document.getElementById("{{$bg->part_type}}bg").style.display = "none";
                        // console.log(document.getElementById("{{$bg->part_type}}"));
                      </script>
                    </td>
                    <th style="padding-top: 25px; margin-left: 5px;">{{$bg->part_type}}</th>
                    <td class="text-center"><input type="text" name="brand" class="sel sel-3"></td>
                    <td class="text-center"><input type="text" name="code" class="sel sel-3"></td>
                    <td class="text-center"><input type="number" name="qty" class="sel sel-3"></td>
                    <td class="text-center"><span></span></td>
                  </tr>
                  @endforeach
                </tbody>
                <tbody id="itemRows1"></tbody>
              </table>              
            </div>
            <button onclick="addRow1(this.form);" type="button" value="Add part type" class="btn-add" style="float: right;"><span>เพิ่มประเภทอะไหล่</span></button>
          </div>         
         

          <!-- Javascript Add Model -->
          <script type="text/javascript">
            // Start Display Button Add Composition
            document.getElementById("locomotive").style.display = "none";
            document.getElementById("bogie").style.display = "none";
            // document.getElementById("head").style.display = "none";
            // document.getElementById("addpart").style.display = "none";
          
            /* Create Input Locomative Part in Model */
            var rowNum = 0;
            function addRow(frm) {
              rowNum ++;
              var row = '<tr id="rowNum'+rowNum+'" class="bg-9"><td><span></span></td><td><input type="text" name="part_type" class="sel sel-3"  value="'+frm.part_type.value+'"></td><td class="text-center"><input type="text" name="brand" class="sel sel-3"  value="'+frm.brand.value+'"></td><td class="text-center"><input type="text" name="code" class="sel sel-3"  value="'+frm.code.value+'"></td><td class="text-center"><input type="number" name="qty" class="sel sel-3" value="'+frm.qty.value+'" /></td><td class="text-center" style="padding-top: 20px;"><input type="button" value="ลบออก &#9866;" class="btn-del-part" onclick="removeRow('+rowNum+');"></td></tr>';
              jQuery('#itemRows').append(row);
              frm.brand.value = '';
              frm.code.value = '';
              frm.qty.value = '';
              frm.part_type.value = '';
            }

            /* Create Input Bogie Part in Model */
            function addRow1(frm) {
              rowNum ++;
              var row1 = '<tr id="rowNum'+rowNum+'" class="bg-9"><td><span></span></td><td><input type="text" name="part_type" class="sel sel-3"  value="'+frm.part_type.value+'"></td><td class="text-center"><input type="text" name="brand" class="sel sel-3"  value="'+frm.brand.value+'"></td><td class="text-center"><input type="text" name="code" class="sel sel-3"  value="'+frm.code.value+'"></td><td class="text-center"><input type="number" name="qty" class="sel sel-3" value="'+frm.qty.value+'" /></td><td class="text-center" style="padding-top: 20px;"><input type="button" value="ลบออก &#9866;" class="btn-del-part" onclick="removeRow('+rowNum+');"></td></tr>';
              jQuery('#itemRows1').append(row1);
              frm.brand.value = '';
              frm.code.value = '';
              frm.qty.value = '';
              frm.part_type.value = '';
            }
          
            /* Remove Input Part in Model */
            function removeRow(rnum) {
              jQuery('#rowNum'+rnum).remove();
            }

            /* Select Car type */
            function getSelectedOptions(sel){
              var opts = [], opt;
              var len = len = sel.options.length;
              for (var i = 0; i < len; i++) {
                opt = sel.options[i];
                // console.log("k");
                if (opt.selected) {
                  opts.push(opt);
                  var type = opt.value;
                  // document.getElementById("head").style.display = "block";
                  // document.getElementById("addpart").style.display = "block";
                  switch(type){
                    case " ": 
                      document.getElementById("locomotive").style.display = "none";
                      document.getElementById("bogie").style.display = "none";
                      break;
                    case "locomotive": 
                      document.getElementById("locomotive").style.display = "block";
                      document.getElementById("bogie").style.display = "none";

                      break;
                    case "bogie":
                      document.getElementById("locomotive").style.display = "none";
                      document.getElementById("bogie").style.display = "block";
                      break;
                  }
                }
              }
              return opt.value;
            }

            /* Check Form: Part In Car Model */
            function carmd(){
              var carmdcarmodel = document.chkcarmd.cars_model.value;
              var carmdcartype = document.chkcarmd.cars_type.value;
              var partbrand = document.chkcarmd.brand.value;
              var partcode = document.chkcarmd.code.value;
              var partqty = document.chkcarmd.qty.value;
              var status;

              if (carmdcarmodel == "") {
                document.getElementById("chkcarmd_carmodel").style.color = "#FF6F00";
                document.getElementById("chkcarmd_carmodel").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสโมเดลตู้รถไฟ";
                status = false;
              }else{
                document.getElementById("chkcarmd_carmodel").style.color = "#006064";
                document.getElementById("chkcarmd_carmodel").innerHTML = "&#x2714;";
                status = true;
              }

              switch(carmdcartype){
                case " ":
                  document.getElementById("chkcarmd_cartype").style.color = "#FF6F00";
                  document.getElementById("chkcarmd_cartype").innerHTML = "&#x2716; โปรดเลือกชนิดของตู้รถไฟ";
                  status = false;
                  break;
                case "locomotive":
                  if (partbrand == "" || partcode == "" || partqty == "") {
                    document.getElementById("chkcarmd_cartype").style.color = "#006064";
                    document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
                    document.getElementById("chkcarmd_part").style.color = "#FF6F00";
                    document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนได้ให้ครบ";
                    status = false;
                  }else if (partqty < 0) {
                    document.getElementById("chkcarmd_cartype").style.color = "#006064";
                    document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
                    document.getElementById("chkcarmd_part").style.color = "#FF6F00";
                    document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลจำนวนอะไหล่ของโมเดลตู้โดยสารประเภทขับเคลื่อนได้เป็นจำนวนเต็มบวก";
                  }else{
                    document.getElementById("chkcarmd_cartype").style.color = "#006064";
                    document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
                    document.getElementById("chkcarmd_part").style.color = "#006064";
                    document.getElementById("chkcarmd_part").innerHTML = "&#x2714; กรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนได้เรียบร้อย";
                    status = true;
                  }
                  return status;
                  break;
                case "bogie":
                  if (partbrand == "" || partcode == "" || partqty == "") {
                    document.getElementById("chkcarmd_cartype").style.color = "#006064";
                    document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
                    document.getElementById("chkcarmd_part").style.color = "#FF6F00";
                    document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนไม่ได้ให้ครบ";
                    status = false;
                  }else if (partqty < 0) {
                    document.getElementById("chkcarmd_cartype").style.color = "#006064";
                    document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
                    document.getElementById("chkcarmd_part").style.color = "#FF6F00";
                    document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลจำนวนอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนไม่ได้เป็นจำนวนเต็มบวก";
                  }
                  else{
                    document.getElementById("chkcarmd_cartype").style.color = "#006064";
                    document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
                    document.getElementById("chkcarmd_part").style.color = "#006064";
                    document.getElementById("chkcarmd_part").innerHTML = "&#x2714; กรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนไม่ได้เรียบร้อย";
                    status = true;
                  }
                  return status;
                  break;
              }
            }
          </script>
            
            <!-- Alert Add Part Detail -->
            <span id="chkcarmd_part" class="checkform"></span>

            <div style="text-align: center;">
              <br>
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button type="button" value="Cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
            </div>
          </div>
        </form>        
      </div>
    <!-- </div> -->
  </div>

    
  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>