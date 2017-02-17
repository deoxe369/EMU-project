<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMU Utilization System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ URL::asset('/css/bootstrap.css') }}" rel="stylesheet" >
  <link href="{{ URL::asset('/css/bootstrap-responsive.css') }}" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css?family=Trirong:400" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/form.css') }}">
  <script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ URL::asset('/js/bootstrap.min.js') }} "></script>
  <script src="{{ URL::asset('/js/function.js') }}"></script>
</head>

<body data-spy="scroll">

  <!--Header-->
    <!-- Navbar -->
    <nav class="navbar navbar-default">
     <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                       
          </button>
          <a class="navbar-brand" href='../'>EMU Utilization System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='../'>ระบบจัดการใช้ชุดรถไฟ</a></li>
            <li><a href='../maintenance_plan'>ระบบจัดการแผนเข้าซ่อม</a></li>
            <li><a href='../trainset_management'>จัดการชุดรถไฟ</a></li>
            <li><a href='../car_management'>จัดการตู้รถไฟ</a></li>
            <li class="active"><a href='../part_management'>จัดการอะไหล่</a></li>
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
        <h1 class="margin"><center>เพิ่มข้อมูลอะไหล่</center></h1>

        <!--Form Add-->
        <form class="form-horizontal" action="add_part">
          <!--New Structure: Table-->
          <table class="table-add col-sm-offset-4">

            <!--Part Type-->
            <tr class="tr-add">
              <td class="td-add"><label for="cdmodel">ประเภท</label></td>
              <td>
                <select id="part_type" name="part_type">
                  <option value=" ">เลือกประเภทของอะไหล่</option>
                @foreach ($part_type_info as $info)
                  <option value={{$info->part_type}} >{{$info->part_type}}</option>
                @endforeach  
                </select>
              </td>
            </tr>

            
          </table>


          

          <!--วันผลิต-->
          <div class="form-group">
            <label class="control-label col-sm-5" >วันผลิต</label>
            <input type="date" name="m_day">
          </div><br>

          <!--วันหมดอายุ-->
          <div class="form-group margin">
            <label class="control-label col-sm-5" >วันหมดอายุ</label>
            <input type="date" name="e_day">
          </div>


          <!--ยี่ห้อ-->
          <div class="form-group margin">
            <label class="control-label col-sm-5" >ยี่ห้อ</label>
           <input type="text" name="brand">
          </div>


          <!--ราคา-->
          <div class="form-group margin">
            <label class="control-label col-sm-5">ราคา</label>
           <input type="text" name="price">
          </div>

          <!--จำนวน-->
          <div class="form-group margin">
            <label class="control-label col-sm-5">จำนวน</label>
           <input type="text" name="qauntity">
          </div>

          <!--Button Save & Cancel-->
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
              <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
              <button formaction="../part_management" value="cancel" class="btn-cancel"><span>Cancel</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>