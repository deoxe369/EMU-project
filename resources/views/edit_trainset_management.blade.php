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
    <div class="container-fluid">    
    <!--First Container-->
      <!--Select Edit-->
      <div class="container">
        <h1 class="margin" style="text-align: center;">แก้ไขข้อมูลชุดรถไฟ</h1>

        <br>

         <form class="form-horizontal" action='../edit_trainset_management/{{$origin_info[0]->train_number}}/save' name="chktrset"  >
            
          <table class="table-add" align="center">
            <tr class="tr-add">
              <td class="td-add"><label for="trainsetno">รหัสชุดรถไฟ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!--Input No.Train Set-->
              <td>{{$origin_info[0]->train_number}}              
                <span id="chktrset_no" class="checkform"></span>
              </td>
            </tr>
            <tr class="tr-add">
              <td class="td-add"><label for="trtype">ประเภท</label></td>
              <td class="col-sm-1"><span></span></td>
              <!--Choose Trainset Type-->
              <td>
                <select id="trtype" name="trtype" onchange=" getSelectedOptions(this)" class="sel">
                  <option value=" ">เลือกประเภทของชุดรถไฟ</option>
                  <option value="passenger" id='passenger'>ชุดรถไฟโดยสาร</option>
                </select>
                <span id="chktrset_type" class="checkform"></span>
              </td>
            </tr>
            
            <tr id="composition" align="right">
                
                <td class="td-add"><p style="margin:auto; font-size: 20px; padding-top: 4px;">เลือก COMPOSITION</p></td>
                <td class="col-sm-1"><span></span></td>
                <td><input onclick="addRow(this.form);" type="button" value="Add cars" />
                    <select name="cars_id"> 
                     <option value={{$origin_loco[0]->id}}>{{$origin_loco[0]->id}}</option>
                      @foreach($cars_loco_info as $loco)
                      <option value={{$loco->id}}>{{$loco->id}}</option>
                      @endforeach
                    </select>
                      @foreach($origin_bogie as $bogie)                      
                        <select name="cars_id">
                         <option value={{$bogie->id}}>{{$bogie->id}}</option>
                          @foreach($cars_bogie_info as $bogie)
                          <option value={{$bogie->id}}>{{$bogie->id}}</option>
                          @endforeach
                        </select>
                      @endforeach   
                   
                <div id="itemRows">
                </div></td>
            </tr> 
            </table>
            <table>
            
            <script type="text/javascript">
            document.getElementById("composition").style.display = "none";
              var train_type = "{{$origin_info[0]->type}}";
              if(train_type == "passenger"){
                document.getElementById("trtype").value = 'passenger';
                document.getElementById("composition").style.display = "block";
              
                console.log(train_type);  
              }
             

              // console.log(x);
              
              var rowNum = 0;
              function addRow(frm) {
                rowNum ++;
                var row = '<a id="rowNum'+rowNum+'">  <select name="cars_id">@foreach($cars_bogie_info as $bogie)<option value={{$bogie->id}}>{{$bogie->id}}</option>@endforeach</select> <input type="button" value="-" onclick="removeRow('+rowNum+');"></a>';
                jQuery('#itemRows').after(row);
                frm.cars_id.value = '';
                console.log( document.getElementById("composition"));
              }
              
              function removeRow(rnum) {
                jQuery('#rowNum'+rnum).remove();
                console.log( rowNum);
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
                                    console.log(opt.value);
                                      switch(opt.value){
                                        case "passenger": 
                                            document.getElementById("composition").style.display = "block";       
                                        break;
                                      }
                                    }
                                 }

                                return opt.value;

                              }
              
            </script>
            
           
           </table>
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