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
        <h1 class="margin" style="text-align: center;">เพิ่มข้อมูลตู้รถไฟ</h1>

        <!-- Form -->
        <form class="form-horizontal" action="add_cars" name="chkcar" onsubmit="return cars()">

          <!-- New Structure: Table -->
          <table class="table-add" align="center">

            <!-- Cars Model -->
            <tr class="tr-add">
              <td class="td-add"><label for="cars_model">โมเดล</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Car Model -->
              <td>
                <input type="text" name="cars_model">
                <span id="chkcars_model" class="checkform"></span>
              </td>
            </tr>

            <!-- Type -->
            <tr class="tr-add">
              <td class="td-add"><label for="cars_type">ชนิดของตู้รถไฟ</td>
              <td class="col-sm-1"><span></span></td>
              <!-- Choose Cars Type -->
              <td>
                <select id="cars_type" name="cars_type" class="sel">
                  <option value=" ">เลือกชนิดของตู้รถไฟ</option>
                  <option value="locomotive">โดยสารประเภทขับเคลื่อนได้</option>
                  <option value="bogie">โดยสารประเภทขับเคลือนไม่ได้</option>
                  <option value="logistic">ขนส่ง</option>
                </select>
                <span id="chkcars_type" class="checkform"></span>
              </td>
            </tr>

            <!--Price-->
            <tr class="tr-add">
              <td class="td-add"><label for="cars_price">ราคา</label></td>
              <td class="col-sm-1"><span></span></td>
              <!-- Input Cars Price -->
              <td>
                <input type="number" name="cars_price">
                <span id="chkcars_price" class="checkform"></span>
              </td>
            </tr>

            <!-- Quantity -->
            <tr class="tr-add">
              <td class="td-add"><label for="cars_qty">จำนวน</label></td>
              <td class="col-sm-1"><span></span></td>
              <td>
                <input type="number" name="cars_qty">            
                <span id="chkcars_qty" class="checkform"></span>
              </td>
            </tr>
        
          </table>

          <br>

          <!--Button Save & Cancel-->
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