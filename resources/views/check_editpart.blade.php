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
            <li><a href='/'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การเข้าซ่อม<span class="caret"></span></a>
              <!-- Drop Maintenance Plan -->
              <ul class="dropdown-menu">
                <li class="normal"><a href='/maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
                <li class="active"><a href='../maintenance'>ระบบจัดการการเข้าซ่อม</a></li>
              </ul>
            </li>
            <li><a href='/trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='/car_management'>จัดการตู้รถไฟ</a></li>
            <li><a href='/part_management'>จัดการอะไหล่</a></li>            
            <li><a href='/depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <!--Content-->
  <div class="container-fluid">
    <!--First Container-->
      <!-- Select Edit -->
      <div class="container">
        <h1 class="margin" style="text-align: center;">เปลี่ยนอะไหล่ของตู้รถไฟ</h1>

        <br>

        <form class="form-horizontal" action="/check_parts/{{$id}}/{{$origin_part_info[0]->part_type}}/save" name="chkedpart" onsubmit="return edpart()">

          <!-- New Structure: Table -->
          <table class="table-add" align="center">

            <!-- Car number -->
            <tr class="tr-add">
              <td class="td-add"><label for="car_number">รหัสตู้รถไฟ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Generate Part Type -->
              <td>
              <p class="form-control-static" style="color: #13a381; font-weight: bold;">{{$id}}</p>
            </td>
              
            </tr>

            <!-- Part Type -->
            <tr class="tr-add">
              <td class="td-add"><label for="part_type">ประเภท</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Generate Part Type -->
              <td>
              <p class="form-control-static" style="color: #13a381; font-weight: bold;">{{$origin_part_info[0]->part_type}}</p>
            </td>
              
            </tr>
            <!-- No. Part -->
            <tr class="tr-add">
              <td class="td-add"><label for="partno"></label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Select No. Part -->
             
              <td>
                 <div style="text-align:center;"><label for="brand">ยี่ห้อ</label></div> 
              </td>
              <td>
                <div style="text-align:center;"><label for="code">รุ่น</label></div> 
              </td>
              
            </tr>
            <!-- No. Part -->
            <tr class="tr-add">
              <td class="td-add"><label for="partno">อะไหล่เดิม</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Select No. Part -->
               <td>
                 <div style="text-align:center;"><label for="brand">{{$origin_part_info[0]->brand}}</label></div> 
              </td>
              <td>
                <div style="text-align:center;"><label for="code">{{$origin_part_info[0]->code}}</label></div> 
              </td>
            </tr>

            <!-- Car ID -->
            <tr class="tr-add">
              <td class="td-add"><label for="carid">อะไหล่ที่เปลี่ยน</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Select Car ID -->
              <td>
                <select id="brand" name="brand" class="sel" onchange=" getSelectedOptions(this)"">
                  <option value=''>เลือกยี่ห้อ</option>
                @foreach($brand_info as $brand)
                  <option value={{$brand->brand}}>{{$brand->brand}}</option>
                @endforeach
                </select>
                <span id="chkedp_carid" class="checkform"></span>
              </td>
              <td>
                <select id="code" name="code" class="sel">
                <option value=''>เลือกรุ่น</option>
                @foreach($code_info as $code)
                  <option id={{$code->brand}} value={{$code->code}}>{{$code->code}}</option>
                @endforeach
                </select>
                <span id="chkedp_carid" class="checkform"></span>
              </td>
            </tr>
          </table>

          <br>

          <!--Button Save & Cancel-->
            <div style="text-align: center;">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button type="button" value="Cancel" class="btn-cancel" onclick="goBack()"><span>Cancel</span></button>
            </div>
        </form>
      </div>

      <!-- Javascript -->
      <script type="text/javascript">
        function getSelectedOptions(sel){
          var opts = [],opt;
          var len = sel.options.length;
          var len1 =  document.getElementById('code').options.length;

          for (var i = 0; i < len; i++) {
            opt = sel.options[i];
            // console.log("k");
            if (opt.selected) {
              opts.push(opt);
              // console.log(opt.value);
              for (var i = 0; i < len1; i++) {
                var code = document.getElementById('code').options[i];
                console.log(code.id);
                if(opt.value == code.id){
                  code.style.display = 'block';
                }else{
                  code.style.display = 'none';
                }
              }
            }
          }
          return opt.value;
        }
    </script>

  </div>

  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>
  
</body>
</html>