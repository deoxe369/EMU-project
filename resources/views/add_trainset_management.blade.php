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
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">

  //
    function comtrdisplay(){
      var option = document.getElementById("trtype").value;
      if (option == " ") {
        document.getElementById("comtrchoose").style.display = "block";
        document.getElementById("comtrcar3").style.display = "none";
        document.getElementById("comtrcar4").style.display = "none";
        document.getElementById("comtrgoods").style.display = "none";
        document.getElementById("comtrtrolley").style.display = "none";
      }
      if (option == "trcar3") {
        document.getElementById("comtrchoose").style.display = "none";
        document.getElementById("comtrcar3").style.display = "block";
        document.getElementById("comtrcar4").style.display = "none";
        document.getElementById("comtrgoods").style.display = "none";
        document.getElementById("comtrtrolley").style.display = "none";
      }
      if (option == "trcar4") {
        document.getElementById("comtrchoose").style.display = "none";
        document.getElementById("comtrcar3").style.display = "none";
        document.getElementById("comtrcar4").style.display = "block";     
        document.getElementById("comtrgoods").style.display = "none";
        document.getElementById("comtrtrolley").style.display = "none";
      }
      if (option == "trgoods") {
        document.getElementById("comtrchoose").style.display = "none";
        document.getElementById("comtrcar3").style.display = "none";
        document.getElementById("comtrcar4").style.display = "none";
        document.getElementById("comtrgoods").style.display = "block";
        document.getElementById("comtrtrolley").style.display = "none";
      }
      if (option == "trtrolley") {
        document.getElementById("comtrchoose").style.display = "none";
        document.getElementById("comtrcar3").style.display = "none";
        document.getElementById("comtrcar4").style.display = "none";
        document.getElementById("comtrgoods").style.display = "none";
        document.getElementById("comtrtrolley").style.display = "block";
      }
    }
  </script>
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
                  <option value="trgoods">ชุดรถไฟขนส่ง</option>
                  <option value="trtrolley">รถรางโยก</option>
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
                <select id="comtrcar3_1">
                  <option value="c3_11">c3.11</option>
                  <option value="c3_12">c3.12</option>
                  <option value="c3_13">c3.13</option>
                </select>
                <select id="comtrcar3_2">
                  <option value="c3_21">c3.21</option>
                  <option value="c3_22">c3.22</option>
                  <option value="c3_23">c3.23</option>
                </select>
                <select id="comtrcar3_3">
                  <option value="c3_31">c3.31</option>
                  <option value="c3_32">c3.32</option>
                  <option value="c3_33">c3.33</option>
                </select>
              </td>
              <!--Composition TransetCar 4-->
              <td id="comtrcar4" style="display: none;">
                <select id="comtrcar4_1">
                  <option value="c4_11">c4.11</option>
                  <option value="c4_12">c4.12</option>
                  <option value="c4_13">c4.13</option>
                </select>
                <select id="comtrcar4_2">
                  <option value="c4_21">c4.21</option>
                  <option value="c4_22">c4.22</option>
                  <option value="c4_23">c4.23</option>
                </select>
                <select id="comtrcar4_3">
                  <option value="c4_31">c4.31</option>
                  <option value="c4_32">c4.32</option>
                  <option value="c4_33">c4.33</option>
                </select>
                <select id="comtrcar4_4">
                  <option value="c4_41">c4.41</option>
                  <option value="c4_42">c4.42</option>
                  <option value="c4_43">c4.43</option>
                </select>
              </td>
              <!--Composition TrainsetGoods Don't done-->
              <td id="comtrgoods" style="display: none;">
                <input type="number" name="comtrgoods" id="comtrgoods" size="20" maxlength="4" value="numcomtrgoods">
              </td>
              <!--Composition Trainset Trolley-->
              <td id="comtrtrolley" style="display: none;">
                <select id="comtrtroll">
                  <option value="comtrtroll_1">comtroll1</option>
                  <option value="comtrtroll_2">comtroll2</option>
                  <option value="comtrtroll_3">comtroll3</option>
                </select>         
              </td>   
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