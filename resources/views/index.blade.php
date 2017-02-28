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
            <li class="active"><a href='../'>ระบบจัดการใช้ชุดรถไฟ<span class="sr-only">(current)</span></a></li>
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
            <li><a href='../part_management'>จัดการอะไหล่</a></li>            
            <li><a href='../depot_management'>จัดการศูนย์ซ่อม</a></li>
          </ul>
        </div>
      </div>
    </nav>


  <!--Content-->
    <!--First Container-->
    <div class="container-fluid text-left">
      <!--Date Current-->
      <div class="row col-md-12">
        <h1 id="datenow" class="margin"></h1>
        <script type="text/javascript">
          now = new Date();
          var thday = new Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
          var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม" ,"สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

          document.getElementById("datenow").innerHTML = "วัน" + thday[now.getDay()] + "ที่" + " " + now.getDate() + " " + thmonth[now.getMonth()] + " " + (0+now.getFullYear()+543);
        </script>
      </div>

      <!--Search Form-->
      <div class="row col-md-12">
        <form>
          <!--Date-->
          <div class="form-group">
            <label for="date"><h3 class="margin">วันที่</h3></label>
            <select id="date" name="date">
              <option value="1">1</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>            
          
            <label for="month"><h3 class="margin">เดือน</h3></label>
            <select id="month" name="month">
              <option value="มกราคม">มกราคม</option>
              <option value="กุมภาพันธ์">กุมภาพันธ์</option>
              <option value="มีนาคม">มีนาคม</option>
              <option value="เมษายน">เมษายน</option>
              <option value="พฤษภาคม">พฤษภาคม</option>
            </select>            
          
            <label for="year"><h3 class="margin">พ.ศ.</h3></label>
            <select id="year" name="year">
              <option value="2555">2555</option>
              <option value="2556">2556</option>
              <option value="2557">2557</option>
              <option value="2558">2558</option>
              <option value="2559">2559</option>
            </select>   

            <label for="originstate"><h3 class="margin">สถานีต้นทาง</h3></label>
            <select id="originstate" name="originstate">
              <option value="ลำชี">ลำชี</option>
              <option value="ชุมทางแก่งคอย">ชุมทางแก่งคอย</option>
              <option value="กรุงเทพ">กรุงเทพ</option>
              <option value="สำโรงทาบ">สำโรงทาบ</option>
              <option value="ขอนแก่น">ขอนแก่น</option>
              <option value="ชุมทางบัวใหญ่">ชุมทางบัวใหญ่</option>
              <option value="อุบลราชธานี">อุบลราชธานี</option>
            </select> 

            <label for="destinationstate"><h3 class="margin">สถานีปลายทาง</h3></label>
            <select id="destinationstate" name="destinationstate">
              <option value="ลำชี">ลำชี</option>
              <option value="ชุมทางแก่งคอย">ชุมทางแก่งคอย</option>
              <option value="กรุงเทพ">กรุงเทพ</option>
              <option value="สำโรงทาบ">สำโรงทาบ</option>
              <option value="ขอนแก่น">ขอนแก่น</option>
              <option value="ชุมทางบัวใหญ่">ชุมทางบัวใหญ่</option>
              <option value="อุบลราชธานี">อุบลราชธานี</option>
            </select>

            <button type="submit" value="Search" class="btn-search"><span>Search</span></button>
          </div>
        </form>
      </div>

        <!--Select Date Dropdown-->

            <!--div class="dropdown">
              <button class="dropbtn">Date <img src="image/arrows_down.png"></button>
              <div class="dropdown-content">
                <a href="#">1</a>
                <a href="#">10</a>
                <a href="#">20</a>
                <a href="#">30</a>
                <a href="#">31</a>   
              </div>
            </div-->




        <!--div class="col-md-2">พ.ศ.</div>
        <div class="col-md-2">สถานีต้นทาง</div>
        <div class="col-md-2">สถานีปลายทาง</div-->
    <!--Second Container-->
      <!--Table Detail-->
      <div class="row col-md-12 margin">
        <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>  
                <th>ทริป</th>
                <th>รหัสชุดรถไฟ</th>
                <th>ชนิด</th>
                <th>สถานีต้นทาง</th>
                <th>เวลาออก</th>
                <th>สถานีปลายทาง</th>
                <th>เวลาถึง</th>
                <th style="color: #f4511e;">แก้ไข</th>
               </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>423</td>
                <td>รถท้องถิ่น</td>
                <td>ลำชี</td>
                <td>04.38</td>
                <td>สำโรงทาบ</td>
                <td>05.40</td>
                <td><a href="#"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <tr>
                <td>2</td>
                <td>431</td>
                <td>รถท้องถิ่น</td>
                <td>ชุมทางแก่นคอย</td>
                <td>05.00</td>
                <td>ขอนแก่น</td>
                <td>11.20</td>
                <td><a href="#"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <tr>
                <td>3</td>
                <td>339</td>
                <td>รถชานเมือง</td>
                <td>กรุงเทพ</td>
                <td>05.20</td>
                <td>ชุมทางแก่งคอย</td>
                <td>08.05</td>
                <td><a href="#"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <tr>
                <td>4</td>
                <td>433</td>
                <td>รถท้องถิ่น</td>
                <td>ชุมทางแก่งคอย</td>
                <td>05.28</td>
                <td>ชุมทางบัวใหญ่</td>
                <td>10.10</td>
                <td><a href="#"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <tr>
                <td>5</td>
                <td>425</td>
                <td>รถท้องถิ่น</td>
                <td>ลำชี</td>
                <td>04.05</td>
                <td>อุบลราชธานี</td>
                <td>08.25</td>
                <td><a href="#"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>

              <tr>
                <td>6</td>
                <td>21</td>
                <td>รถด่วนพิเศษ</td>
                <td>กรุงเทพ</td>
                <td>05.45</td>
                <td>อุบลราชธานี</td>
                <td>14.20</td>
                <td><a href="#"><img src="image/icon/edit_orange.png" onmouseover="this.src='image/icon/edit_yellow.png'" onmouseout="this.src='image/icon/edit_orange.png'"></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


      <div class="container"><center>
        <ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#" class="active">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>      
      </center></div>


    </div>



  <!--Footer-->

</body>
</html>