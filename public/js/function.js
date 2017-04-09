  /*********************** Relation Between Train Set Type and Composition1 ***********************/
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

  /************************************* Go Back **************************************/
  function goBack() {
    window.history.back();
  }

  /************************************* Add Trainset Management **************************************/
  function maint(){
    var mainttrno = document.chkmaint.trainsetno.value;
    var maintdepno = document.chkmaint.depotno.value;
    var maintendate = document.chkmaint.endate.value;
    var status;

    if (maintendate == "") {
      document.getElementById("chkmaint_endate").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกวันเข้าซ่อมบำรุง";
      status = false;
    }else{
      document.getElementById("chkmaint_endate").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (mainttrno == " ") {
      document.getElementById("chkmaint_trsetno").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chkmaint_trsetno").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (maintdepno == " ") {
      document.getElementById("chkmaint_depotno").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chkmaint_depotno").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    return status;
  }

  /************************************* Add Trainset Management **************************************/
  function trset(){
    var trsetno = document.chktrset.trainsetno.value;
    var trsettype = document.chktrset.trtype.value;

    // Cars3
    var comtrcar3_1 = document.chktrset.comtrcar3_1.value;
    var comtrcar3_2 = document.chktrset.comtrcar3_2.value;
    var comtrcar3_3 = document.chktrset.comtrcar3_3.value;

    // Cars4
    var comtrcar4_1 = document.chktrset.comtrcar4_1.value;
    var comtrcar4_2 = document.chktrset.comtrcar4_2.value;
    var comtrcar4_3 = document.chktrset.comtrcar4_3.value;
    var comtrcar4_4 = document.chktrset.comtrcar4_4.value;

    var status;

    if (trsetno == "") {
      document.getElementById("chktrset_no").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else if (trsetno !== isNaN) {
      document.getElementById("chktrset_no").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟเป็นตัวเลข";
      status = false;
    }else{
      document.getElementById("chktrset_no").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }


    if (trsettype == " ") {
      document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลประเภทชุดรถไฟ";
      status = false;
    } else if (trsettype == "trcar3") {
      if (comtrcar3_1 == " " || comtrcar3_2 == " " || comtrcar3_3 == " ") {
        document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
        document.getElementById("chkcomtrcar").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกตู้รถไฟให้ครบ";
        status = false;
      } else if (comtrcar3_2 == comtrcar3_3) {
        document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
        document.getElementById("chkcomtrcar").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกตู้รถไฟไม่ซ้ำกัน";
        status = false;
      } else{
        document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
        document.getElementById("chkcomtrcar").innerHTML = "<img src= 'image/icon/check.png'>";
      }
    } else if (trsettype == "trcar4") {
      if (comtrcar4_1 == " " || comtrcar4_2 == " " || comtrcar4_3 == " " || comtrcar4_4 == " ") {
        document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
        document.getElementById("chkcomtrcar").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกตู้รถไฟให้ครบ";
        status = false;
      } else if (comtrcar4_2 == comtrcar4_3 || comtrcar4_3 == comtrcar4_4 || comtrcar4_2 == comtrcar4_4) {
        document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
        document.getElementById("chkcomtrcar").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกตู้รถไฟไม่ซ้ำกัน";
        status = false;
      } else{
        document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
        document.getElementById("chkcomtrcar").innerHTML = "<img src= 'image/icon/check.png'>";
      }
    } else{
      document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    // if (trsettype == " ") {
    //   document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
    //   status = false;
    // }else{
    //   document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
    // }

    return status;
  }


  /************************************* Add Car Management **************************************/
  function cars(){
    var carsmodel = document.chkcar.cars_model.value;
    var carstype = document.chkcar.cars_type.value;
    var carsprice = document.chkcar.cars_price.value;
    var carsqty = document.chkcar.cars_qty.value;
    var status;

    if (carsmodel == "") {
      document.getElementById("chkcars_model").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลโมเดลของตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkcars_model").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (carstype == " ") {
      document.getElementById("chkcars_type").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกชนิดของตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkcars_type").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (carsprice == "") {
      document.getElementById("chkcars_price").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลราคาของตู้รถไฟ";
      status = false;
    }else if (carsprice < 0) {
      document.getElementById("chkcars_price").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกราคาเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_price").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (carsqty == "") {
      document.getElementById("chkcars_qty").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลจำนวนของตู้รถไฟ";
      status = false;
    }else if (carsqty < 0) {
      document.getElementById("chkcars_qty").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_qty").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    return status;
  }


   /************************************* Add Part Management **************************************/
   function part(){
    var parttype = document.chkpart.part_type.value;
    var mday = document.chkpart.m_day.value;
    var eday = document.chkpart.e_day.value;
    var partbrand = document.chkpart.brand.value;
    var partprice = document.chkpart.price.value;
    var partqty = document.chkpart.qauntity.value;
    var status;

    if (partbrand == "") {
      document.getElementById("chkpart_brand").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลยี่ห้อของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_brand").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (mday == NULL) {
      document.getElementById("chkpart_mday").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกวันผลิตของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_mday").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (eday == "") {
      document.getElementById("chkpart_eday").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกวันหมดอายุของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_eday").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (partprice == "") {
      document.getElementById("chkpart_price").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลราคาของอะไหล่";
      status = false;
    }else if (partprice < 0) {
      document.getElementById("chkpart_price").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkpart_price").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (partqty == "") {
      document.getElementById("chkpart_qty").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลจำนวนของอะไหล่";
      status = false;
    }else if (partqty < 0) {
      document.getElementById("chkpart_qty").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkpart_qty").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (parttype == " ") {
      document.getElementById("chkpart_type").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกประเภทของอะไหล่";
      return false;
    }else{
      document.getElementById("chkpart_type").innerHTML = "<img src= 'image/icon/check.png'>";
    }

      return status;
  }


  /************************************* Add Depot Management **************************************/
  
  function depot(){
    var depotcapacity = document.chkdepot.capacity.value;
    var depotlocname = document.chkdepot.location_name.value;
    var depotposition = document.chkdepot.depotno.value;
    var depotlv = document.chkdepot.depotlevel.value;
    var status;


    if (depotlocname == "") {
      document.getElementById("chkdepot_locname").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลชื่อตำแหน่งศูนย์ซ่อม";
      status = false;
    }else{
      document.getElementById("chkdepot_locname").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (depotcapacity == " ") {
      document.getElementById("chkdepot_capacity").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกจำนวนที่ศูนย์ซ่อมรับได้";
      status = false;
    }else{
      document.getElementById("chkdepot_capacity").innerHTML = "<img src= 'image/icon/check.png'>";
     
    }

    if (depotposition == "") {
      document.getElementById("chkdepot_position").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลตำแหน่งศูนย์ซ่อม";
      status = false;
    }else{
      document.getElementById("chkdepot_position").innerHTML = "<img src= 'image/icon/check.png'>";
      
    }

    if (depotlv == "") {
      document.getElementById("chkdepot_level").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกระดับการเข้าซ่อมบำรุง"; 
      status = false;
    }else{
      document.getElementById("chkdepot_level").innerHTML = "<img src= 'image/icon/check.png'>";
      
    }
    
    return status;
  }


  /****************************************** Check Part **********************************/
  function writeText(txt) {
    document.getElementById("desc").innerHTML = txt;
  }

  function edpart(){
    var edpartpartno = document.chkedpart.partno.value;
    var edpartcarid = document.chkedpart.carid.value;
    var edpartdistance = document.chkedpart.totle_dist.value;
    var edparttime = document.chkedpart.totle_time.value;
    var status;

    if (edpartdistance == "") {
      document.getElementById("chkedp_dist").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลระยะทางสะสมของอะไหล่";
      status = false;
    }else if (edpartdistance < 0) {
      document.getElementById("chkedp_dist").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkedp_dist").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (edparttime == "") {
      document.getElementById("chkedp_time").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลระยะเวลาสะสมของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkedp_time").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (edpartcarid == " ") {
      document.getElementById("chkedp_carid").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกรหัสตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkedp_carid").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (edpartpartno == " ") {
      document.getElementById("chkedp_partno").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกรหัสอะไหล่";
      status = false;
    }else{
      document.getElementById("chkedp_partno").innerHTML = "<img src= 'image/icon/check.png'>";

    }
    
    return status;
  }
  