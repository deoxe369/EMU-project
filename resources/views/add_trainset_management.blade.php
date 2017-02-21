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
     <nav class="navbar navbar-default b">
      <div class="container-fluid2">
        <!-- Brand and toggle get grouped for better mobile display-->
        <div class="navbar-header bg-5">
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
        <h1 class="margin"><center>เพิ่มข้อมูลชุดรถไฟ</center></h1>

        <!--Form Add-->
        <form class="form-horizontal" action="add_trainset">
          <!--New Structure: Table-->
          <table class="table-add col-sm-offset-4">

            <!--No.Trian Set-->
            <tr class="tr-add">
              <td class="td-add"><label for="trainsetno">รหัสชุดรถไฟ</label></td>
              <!--Choose No.Train Set-->
              <td><input type="text" name="trainsetno"></td>
            </tr>

            <!--Trainset Type-->
            <tr class="tr-add">
              <td class="td-add"><label for="trtype">ชนิด</label></td>
              <!--Choose Trainset Type-->
              <td>
                <select id="trtype" name="trtype" onchange="comtrdisplay(this)">
                  <option value=" ">เลือกชนิดของชุดรถไฟ</option>
                  <option value="trcar3">ชุดรถไฟโดยสาร 3</option>
                  <option value="trcar4">ชุดรถไฟโดยสาร 4</option>
            <!--       <option value="trgoods">ชุดรถไฟขนส่ง</option>
                  <option value="trtrolley">รถรางโยก</option> -->
                </select>
              </td>
            </tr>

            <!--Composition-->
            <tr class="tr-add">
              <td class="td-add"><label for="composition">composition</label></td>
              <!--Choose Composition-->
              <td id="comtrchoose" style="display: block;">
                <p>CHOOSE COMPOSITION</p>         
              </td>
              <!--Composition TransetCar 3-->
              <td id="comtrcar3" style="display: none;">
                <select id="comtrcar3_1" name="comtrcar3_1">
                 @foreach ($cars_loco_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                @endforeach  
                </select>
                <select id="comtrcar3_2" name="comtrcar3_2">
                  @foreach ($cars_bogie_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                @endforeach  
                </select>
                <select id="comtrcar3_3" name="comtrcar3_3">
                  @foreach ($cars_bogie_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                  @endforeach
                </select>
              </td>
              <!--Composition TransetCar 4-->
              <td id="comtrcar4" style="display: none;">
                <select id="comtrcar4_1" name="comtrcar4_1">
                  @foreach ($cars_loco_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                @endforeach  
                </select>
                <select id="comtrcar4_2" name="comtrcar4_2">
                  @foreach ($cars_bogie_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                @endforeach
                </select>
                <select id="comtrcar4_3" name="comtrcar4_3">
                  @foreach ($cars_bogie_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                @endforeach
                </select>
                <select id="comtrcar4_4" name="comtrcar4_4">
                  @foreach ($cars_bogie_info as $info)
                  <option value={{$info->id}}>{{$info->id}}</option>
                @endforeach
                </select>
              </td>
              <!--Composition TrainsetGoods Don't done-->
              <!-- <td id="comtrgoods" style="display: none;">
                <input type="number" name="comtrgoods" id="comtrgoods" size="20" maxlength="4" value="numcomtrgoods">
              </td> -->
              <!--Composition Trainset Trolley-->
              <!-- <td id="comtrtrolley" style="display: none;">
                <select id="comtrtroll">
                  <option value="comtrtroll_1">comtroll1</option>
                  <option value="comtrtroll_2">comtroll2</option>
                  <option value="comtrtroll_3">comtroll3</option>
                </select>         
              </td>    -->
            </tr>
          </table>

          <br>

          <!--Button Save & Cancel-->
          <div class="col-sm-offset-5 col-sm-5">
            <button type="submit" value="Save" class="btn-save"><span>Save</span></button>
            <button formaction="../trainset_management" value="cancel" class="btn-cancel"><span>Cancel</span></button>
          </div>     

        </form>       
      </div>
    </div>

    
  <!--Footer-->

</body>
</html>