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
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li class="active"><a href='../part_management'>จัดการอะไหล่</a></li>            
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
        <h1 class="margin" style="text-align: center;">เพิ่มข้อมูลอะไหล่</h1>

        <br>

        <!--Form Add-->
        <form class="form-horizontal" action="add_part" name="chkpart" onsubmit="return part()">
          <!--New Structure: Table-->
          <table class="table-add" align="center"> 

            <!--Part Type-->
            <tr class="tr-add">
              <td class="td-add"><label for="cdmodel">ประเภท</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Choose Part Type -->
              <td>
                <select id="part_type" name="part_type" class="sel">
                  <option value=" ">-- เลือกประเภทของอะไหล่ --</option>
                  @foreach ($part_type_info as $info)
                  <option value={{$info->part_type}} >{{$info->part_type}}</option>
                  @endforeach  
                </select>
                <span id="chkpart_type" class="checkform"></span>
              </td>
            </tr>

            <!-- วันผลิต -->
            <tr class="tr-add">
              <td class="td-add"><label for="m_day">วันผลิต</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input วันผลิต -->
              <td>
                <input type="date" name="m_day">
                <span id="chkpart_mday" class="checkform"></span>
              </td>
            </tr>

            <!-- วันหมดอายุ -->
            <tr class="tr-add">
              <td class="td-add"><label for="e_day">วันหมดอายุ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input วันหมดอายุ -->
              <td>
                <input type="date" name="e_day">
                <span id="chkpart_eday" class="checkform"></span>
              </td>
            </tr>

            <!-- ยี่ห้อ -->
            <tr class="tr-add">
              <td class="td-add"><label for="brand">ยี่ห้อ</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Part Brand -->
              <td>
                <input type="text" name="brand">
                <span id="chkpart_brand" class="checkform"></span>
              </td>
            </tr>

            <!--รุ่น -->
            <tr class="tr-add">
              <td class="td-add"><label for="code">รุ่น</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Part Code -->
              <td>
                <input type="text" name="code">
                <span id="chkpart_code" class="checkform"></span>
              </td>
            </tr>

           <!--  ราคา -->
            <tr class="tr-add">
              <td class="td-add"><label for="price">ราคา</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Part Price -->
              <td>
                <input type="number" name="price">
                <span id="chkpart_price" class="checkform"></span>
              </td>
            </tr>

            <!-- จำนวน -->
            <tr class="tr-add">
              <td class="td-add"><label for="qauntity">จำนวน</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Part Qauntity -->
              <td>
                <input type="number" name="qauntity">
                <span id="chkpart_qty" class="checkform"></span>
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
    </div>
  </div>

    
  <!--Footer-->
  <footer class="bg-10">
    <p class="copy-footer">&copy; 2016 - 2017 by EMU Utilization System. All rights reserved.</p>
  </footer>

</body>
</html>