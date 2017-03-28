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
    <div class="container-fluid">    
    <!--First Container-->
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">เพิ่มโมเดลตู้รถไฟ</h1>

        <form action = "/add_model/save">
        <div id="itemRows">



              <label for="cars_model">โมเดล</label>
             <input type="text" name="cars_model">
             <br>
             <label for="cars_type">ชนิดของตู้รถไฟ</label>
              <select id="cars_type" name="cars_type" class="sel" onchange=" getSelectedOptions(this)">
                  <option value=" ">เลือกชนิดของตู้รถไฟ</option>
                  <option value="locomotive">โดยสารประเภทขับเคลื่อนได้</option>
                  <option value="bogie">โดยสารประเภทขับเคลือนไม่ได้</option>
                  <option value="logistic">ขนส่ง</option>
                </select>
                <br>
                <div id = "head">
                <label for="cars_price">อะไหล่</label>
                <label for="cars_price">ยี่ห้อ</label>
                <label for="cars_price">รุ่น</label>
                <label for="cars_price">จำนวน</label>
                <br>
                </div>
                <div id = "locomotive">
                 @foreach($locomotive as $loco)
                <input type="checkbox" name="part_type" value="{{$loco->part_type}}" id="{{$loco->part_type}}lo" checked>
                <script type="text/javascript">
                   document.getElementById("{{$loco->part_type}}lo").style.display = "none";
                   // console.log(document.getElementById("{{$loco->part_type}}"));
                </script>
                 <label for="part_type">{{$loco->part_type}}</label>
                 <input type="text" name="brand" style="margin-right: 10px;width: 200px">
                <input type="text" name="code" style="margin-right: 10px;width: 200px">
                <input type="number" name="qty" style="width: 200px">
                <br>

                 @endforeach
                </div>


                <div id = "bogie">
                 @foreach($bogie as $bg)
                 <input type="checkbox" name="part_type" value="{{$bg->part_type}}" id="{{$bg->part_type}}bg" checked>
                <script type="text/javascript">
                   document.getElementById("{{$bg->part_type}}bg").style.display ="none";
                </script>
                 <label for="part_type">{{$bg->part_type}}</label>
                 <input type="text" name="brand" style="margin-right: 10px;width: 200px">
                <input type="text" name="code" style="margin-right: 10px;width: 200px">
                <input type="number" name="qty" style="width: 80px">
                <br>

                 @endforeach
                </div>
        <div id = "addpart">
        <input type="text" name="part_type"  />      
        <input type="text" name="brand"  /> 
        <input type="text" name="code" />
        <input type="number" name="qty" />  
        <input onclick="addRow(this.form);" type="button" value="Add part" />
        </div>

        <script type="text/javascript">

            document.getElementById("locomotive").style.display = "none";
            document.getElementById("bogie").style.display = "none";
             document.getElementById("head").style.display = "none";
             document.getElementById("addpart").style.display = "none";
            var rowNum = 0;
            function addRow(frm) {
            rowNum ++;
            var row = '<p id="rowNum'+rowNum+'"><input type="text" name="part_type" value="'+frm.part_type.value+'" /><input type="text" name="brand" value="'+frm.brand.value+'"><input type="text" name="code" value="'+frm.code.value+'"> <input type="number" name="qty" size="4" value="'+frm.qty.value+'" /> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"> <input onclick="addRow(this.form);" type="button" value="Add part" /> </p>';
            jQuery('#itemRows').append(row);
            frm.brand.value = '';
            frm.code.value = '';
            frm.qty.value = '';
            frm.part_type.value = '';
          }
            function removeRow(rnum) {

              jQuery('#rowNum'+rnum).remove();

              }

              function getSelectedOptions(sel){
                                var opts = [],
                                  opt;
                                var len = len = sel.options.length;
                                for (var i = 0; i < len; i++) {
                                  opt = sel.options[i];
                                  // console.log("k");
                                  if (opt.selected) {
                                    opts.push(opt);
                                    var type = opt.value;
                                    document.getElementById("head").style.display = "block";
                                    document.getElementById("addpart").style.display = "block";
                                  switch(type){
                                      case "locomotive": 
                                          document.getElementById("locomotive").style.display = "block";
                                          document.getElementById("bogie").style.display = "none";
                                          
                                      break;
                                      case "bogie": 
                                        document.getElementById("bogie").style.display = "block";
                                        document.getElementById("locomotive").style.display = "none";

                                      break;
                                         }
                                    }
                                 }

                                return opt.value;

                              }
              
        </script>
  
        </div>
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