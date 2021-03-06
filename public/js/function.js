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


  /************************************* Add Traincirculation **************************************/
  function trcir(){
    var status;

    if($('[name=trainsetno]:checked').length){
      document.getElementById("chktrcir_trsetno").style.color = "#006064";
      document.getElementById("chktrcir_trsetno").innerHTML = "&#x2714; เลือกชุดรถไฟที่เหมาะสมกับเส้นทางนี้เรียบร้อย";
      status = true;
    }else{
      document.getElementById("chktrcir_trsetno").style.color = "#FF6F00";
      document.getElementById("chktrcir_trsetno").innerHTML = "&#x2716; โปรดเลือกชุดรถไฟที่เหมาะสมกับเส้นทางนี้";
      status = false;
    }
    return status;
  }


  /************************************* Add Maintenance Management **************************************/
  function maint(){
    var mainttrno = document.chkmaint.trainsetno.value;
    var maintdepno = document.chkmaint.depotno.value;
    var maintendate = document.chkmaint.endate.value;
    var status;

    if (maintendate == "") {
      // document.getElementById("chkmaint_endate").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกวันเข้าซ่อมบำรุง";
      document.getElementById("chkmaint_endate").style.color = "#FF6F00";
      document.getElementById("chkmaint_endate").innerHTML = "&#x2716; โปรดเลือกวันเข้าซ่อมบำรุง";
      status = false;
    }else{
      //document.getElementById("chkmaint_endate").innerHTML = "<img src= 'image/icon/check.png'>";
      document.getElementById("chkmaint_endate").style.color = "#006064";
      document.getElementById("chkmaint_endate").innerHTML = "&#x2714;";
      status = true;
    }

    if (mainttrno == " ") {
      document.getElementById("chkmaint_trsetno").style.color = "#FF6F00";
      document.getElementById("chkmaint_trsetno").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chkmaint_trsetno").style.color = "#006064";
      document.getElementById("chkmaint_trsetno").innerHTML = "&#x2714;";
    }

    if (maintdepno == " ") {
      document.getElementById("chkmaint_depotno").style.color = "#FF6F00";
      document.getElementById("chkmaint_depotno").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสศูนย์ซ่อม";
      status = false;
    }else{
      document.getElementById("chkmaint_depotno").style.color = "#006064";
      document.getElementById("chkmaint_depotno").innerHTML = "&#x2714;";
    }

    return status;
  }


  /************************************* Delete Maintenance **************************************/
  function dmaint(){
    var status;

    if ($('[name=choose]:checked').prop('checked')) {
      document.getElementById("chkdmaint_choose").style.color = "#006064";
      document.getElementById("chkdmaint_choose").innerHTML = "&#x2714; เลือกใบเข้าซ่อมที่ต้องการลบเรียบร้อย";
      status = true;
    } else {
      document.getElementById("chkdmaint_choose").style.color = "#FF6F00";
      document.getElementById("chkdmaint_choose").innerHTML = "&#x2716; โปรดเลือกใบเข้าซ่อมที่ต้องการลบก่อน";
      status = false;
    }
    return status;
  }


  /************************************* Maintenance Plan **************************************/
  function maintpl(){
    var status;

    if ($('[name=choose]:checked').prop('checked')) {
      document.getElementById("chkmaintpl_choose").style.color = "#006064";
      document.getElementById("chkmaintpl_choose").innerHTML = "&#x2714; เลือกชุดรถไฟที่ต้องการเข้าซ่อมเรียบร้อย";
      status = true;
    } else {
      document.getElementById("chkmaintpl_choose").style.color = "#FF6F00";
      document.getElementById("chkmaintpl_choose").innerHTML = "&#x2716; โปรดเลือกชุดรถไฟที่ต้องการเข้าซ่อมก่อน";
      status = false;
    }
    return status;
  }


  /************************************* Add Trainset Management **************************************/

  function trset(){
    var trsetno = document.chktrset.trainsetno.value;
    var trsettype = document.chktrset.trtype.value;
    var trsetlocation = document.chktrset.location.value;
    var status;
    
    if (trsetno == "") {
      document.getElementById("chktrset_no").style.color = "#FF6F00";
      document.getElementById("chktrset_no").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else if (isNaN(trsetno)) {
      document.getElementById("chktrset_no").style.color = "#FF6F00";
      document.getElementById("chktrset_no").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสชุดรถไฟเป็นตัวเลข";
      status = false;
    }else if (trsetno < 0) {
      document.getElementById("chktrset_no").style.color = "#FF6F00";
      document.getElementById("chktrset_no").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสชุดรถไฟเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chktrset_no").style.color = "#006064";
      document.getElementById("chktrset_no").innerHTML = "&#x2714;";
      status = true;
    }

    if (trsetlocation == " ") {
      document.getElementById("chktrset_location").style.color = "#FF6F00";
      document.getElementById("chktrset_location").innerHTML = "&#x2716; โปรดเลือกตำแหน่งของชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chktrset_location").style.color = "#006064";
      document.getElementById("chktrset_location").innerHTML = "&#x2714;";
    }


    if (trsettype == " ") {
      document.getElementById("chktrset_type").style.color = "#FF6F00";
      document.getElementById("chktrset_type").innerHTML = "&#x2716; โปรดเลือกข้อมูลประเภทชุดรถไฟ";
      status = false;
    }else if (trsettype == "passenger") {
      console.log(rowNum);
      for (var i =  0; i < rowNum+2; i++){
        // var k = 2+i;
        var b = 'cars_id_bo'+i;
        console.log(b);
        console.log(document.getElementById(b).value);
        if(document.getElementById(b).value == " "){
          document.getElementById("chktrset_type").style.color = "#006064";
          document.getElementById("chktrset_type").innerHTML = "&#x2714;";
          document.getElementById("chktrset_carid").style.color = "#FF6F00";
          document.getElementById("chktrset_carid").innerHTML = "&#x2716; โปรดเลือกรหัสชุดรถไฟให้ครบ";
          status = false;
        }
        else {
          document.getElementById("chktrset_type").style.color = "#006064";
          document.getElementById("chktrset_type").innerHTML = "&#x2714;";
          document.getElementById("chktrset_carid").style.color = "#006064";
          document.getElementById("chktrset_carid").innerHTML = "&#x2714; เลือกรหัสตู้รถไฟครบ";
        }
      }
    }
    return status;
  }


  /************************************* Edit Trainset Management **************************************/

  function etrset(){
    var trsettype = document.chketrset.trtype.value;
    var status;


    if (trsettype == " ") {
      document.getElementById("chktrset_type").style.color = "#FF6F00";
      document.getElementById("chktrset_type").innerHTML = "&#x2716; โปรดเลือกประเภทของชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chktrset_type").style.color = "#006064";
      document.getElementById("chktrset_type").innerHTML = "&#x2714;";
      status = true;
    }  

    return status;
  }



  /************************************* Delete Trainset **************************************/
  function dtrset(){
    var status;

    if ($('[name=choose]:checked').prop('checked')) {
      document.getElementById("chkdtrset_choose").style.color = "#006064";
      document.getElementById("chkdtrset_choose").innerHTML = "&#x2714; เลือกชุดรถไฟที่ต้องการลบเรียบร้อย";
      status = true;
    } else {
      document.getElementById("chkdtrset_choose").style.color = "#FF6F00";
      document.getElementById("chkdtrset_choose").innerHTML = "&#x2716; โปรดเลือกชุดรถไฟที่ต้องการลบก่อน";
      status = false;
    }
    return status;
  }
  

  /************************************* Add Car Model **************************************/
  function carmd(){
    var carmdcarmodel = document.chkcarmd.cars_model.value;
    var carmdcartype = document.chkcarmd.cars_type.value;
    // var partbrand = document.chkcarmd.brand.value;
    // var partcode = document.chkcarmd.code.value;
    // var partqty = document.chkcarmd.qty.value;
    var status;
    
    console.log(carmdcarmodel);
    console.log(carmdcartype);
    console.log(partbrand);
    console.log(partcode);
    console.log(partqty);
   
    if (carmdcarmodel == "") {
      document.getElementById("chkcarmd_carmodel").style.color = "#FF6F00";
      document.getElementById("chkcarmd_carmodel").innerHTML = "&#x2716; โปรดกรอกข้อมูลรหัสโมเดลตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkcarmd_carmodel").style.color = "#006064";
      document.getElementById("chkcarmd_carmodel").innerHTML = "&#x2714;";
      status = true;
    }

    switch(carmdcartype){
      case " ":
        document.getElementById("chkcarmd_cartype").style.color = "#FF6F00";
        document.getElementById("chkcarmd_cartype").innerHTML = "&#x2716; โปรดเลือกชนิดของตู้รถไฟ";
        status = false;
        break;
      case "locomotive":
        var partbrand = document.getElementById("water_treatmentb").value;
        var partcode = document.getElementById("water_treatmentc").value;
        var partqty = document.getElementById("water_treatmentq").value;
        if (partbrand == "" || partcode == "" || partqty == "") {
          document.getElementById("chkcarmd_cartype").style.color = "#006064";
          document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
          document.getElementById("chkcarmd_part").style.color = "#FF6F00";
          document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนได้ให้ครบ";
          status = false;
        }else if (partqty < 0) {
          document.getElementById("chkcarmd_cartype").style.color = "#006064";
          document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
          document.getElementById("chkcarmd_part").style.color = "#FF6F00";
          document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลจำนวนอะไหล่ของโมเดลตู้โดยสารประเภทขับเคลื่อนได้เป็นจำนวนเต็มบวก";
          status = false;
        }else{
          document.getElementById("chkcarmd_cartype").style.color = "#006064";
          document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
          document.getElementById("chkcarmd_part").style.color = "#006064";
          document.getElementById("chkcarmd_part").innerHTML = "&#x2714; กรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนได้เรียบร้อย";
          status = true;
        }
        // return status;
        break;
      case "bogie":
        var partbrand = document.getElementById("doorsb").value;
        var partcode = document.getElementById("doorsc").value;
        var partqty = document.getElementById("doorsq").value;
        if (partbrand == "" || partcode == "" || partqty == "") {
          document.getElementById("chkcarmd_cartype").style.color = "#006064";
          document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
          document.getElementById("chkcarmd_part").style.color = "#FF6F00";
          document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนไม่ได้ให้ครบ";
          status = false;
        }else if (partqty = 0) {
          document.getElementById("chkcarmd_cartype").style.color = "#006064";
          document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
          document.getElementById("chkcarmd_part").style.color = "#FF6F00";
          document.getElementById("chkcarmd_part").innerHTML = "&#x2716; โปรดกรอกข้อมูลจำนวนอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนไม่ได้เป็นจำนวนเต็มบวก";
          status = false;
        }else{
          document.getElementById("chkcarmd_cartype").style.color = "#006064";
          document.getElementById("chkcarmd_cartype").innerHTML = "&#x2714;";
          document.getElementById("chkcarmd_part").style.color = "#006064";
          document.getElementById("chkcarmd_part").innerHTML = "&#x2714; กรอกข้อมูลอะไหล่ของโมเดลตู้รถไฟโดยสารประเภทขับเคลื่อนไม่ได้เรียบร้อย";
          status = true;
        }
        // return status;
        break;
    }
    return status;
  }


  /************************************* Add Car Management **************************************/
  function cars(){
    var carsmodel = document.chkcar.cars_model.value;
    // var carstype = document.chkcar.cars_type.value;
    var carsprice = document.chkcar.cars_price.value;
    var carsqty = document.chkcar.cars_qty.value;
    var status;

    if (carsmodel == " ") {
      document.getElementById("chkcars_model").style.color = "#FF6F00";
      document.getElementById("chkcars_model").innerHTML = "&#x2716; โปรดกรอกข้อมูลโมเดลของตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkcars_model").style.color = "#006064";
      document.getElementById("chkcars_model").innerHTML = "&#x2714;";
      status = true;
    }

    /*if (carstype == " ") {
      document.getElementById("chkcars_type").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดเลือกชนิดของตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkcars_type").innerHTML = "<img src= 'image/icon/check.png'>";
    }*/

    if (carsprice == "") {
      document.getElementById("chkcars_price").style.color = "#FF6F00";
      document.getElementById("chkcars_price").innerHTML = "&#x2716; โปรดกรอกข้อมูลราคาของตู้รถไฟ";
      status = false;
    }else if (carsprice < 0) {
      document.getElementById("chkcars_price").style.color = "#FF6F00";
      document.getElementById("chkcars_price").innerHTML = "&#x2716; โปรดกรอกราคาเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_price").style.color = "#006064";
      document.getElementById("chkcars_price").innerHTML = "&#x2714;";
    }

    if (carsqty == "") {
      document.getElementById("chkcars_qty").style.color = "#FF6F00";
      document.getElementById("chkcars_qty").innerHTML = "&#x2716; โปรดกรอกข้อมูลจำนวนของตู้รถไฟ";
      status = false;
    }else if (carsqty < 0) {
      document.getElementById("chkcars_qty").style.color = "#FF6F00";
      document.getElementById("chkcars_qty").innerHTML = "&#x2716; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_qty").style.color = "#006064";
      document.getElementById("chkcars_qty").innerHTML = "&#x2714;";
    }

    return status;
  }

  /************************************* Edit Car Management **************************************/
  function ecars(){
    var carsmodel = document.chkecar.cars_model.value;
    var carsprice = document.chkecar.cars_price.value;
    var status;

    if (carsmodel == " ") {
      document.getElementById("chkcars_model").style.color = "#FF6F00";
      document.getElementById("chkcars_model").innerHTML = "&#x2716; โปรดกรอกข้อมูลโมเดลของตู้รถไฟ";
      status = false;
    }else{
      document.getElementById("chkcars_model").style.color = "#006064";
      document.getElementById("chkcars_model").innerHTML = "&#x2714;";
      status = true;
    }

    if (carsprice == "") {
      document.getElementById("chkcars_price").style.color = "#FF6F00";
      document.getElementById("chkcars_price").innerHTML = "&#x2716; โปรดกรอกข้อมูลราคาของตู้รถไฟ";
      status = false;
    }else if (carsprice < 0) {
      document.getElementById("chkcars_price").style.color = "#FF6F00";
      document.getElementById("chkcars_price").innerHTML = "&#x2716; โปรดกรอกราคาเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_price").style.color = "#006064";
      document.getElementById("chkcars_price").innerHTML = "&#x2714;";
    }

    return status;
  }

  /************************************* Delete Car **************************************/
  function dcars(){
    var status;

    if ($('[name=choose]:checked').prop('checked')) {
      document.getElementById("chkdcars_choose").style.color = "#006064";
      document.getElementById("chkdcars_choose").innerHTML = "&#x2714; เลือกตู้รถไฟที่ต้องการลบเรียบร้อย";
      status = true;
    } else {
      document.getElementById("chkdcars_choose").style.color = "#FF6F00";
      document.getElementById("chkdcars_choose").innerHTML = "&#x2716; โปรดเลือกตู้รถไฟที่ต้องการลบก่อน";
      status = false;
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
    var partcode = document.chkpart.code.value;
    var status;

    if (partbrand == "") {
      document.getElementById("chkpart_brand").style.color = "#FF6F00";
      document.getElementById("chkpart_brand").innerHTML = "&#x2716; โปรดกรอกข้อมูลยี่ห้อของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_brand").style.color = "#006064";
      document.getElementById("chkpart_brand").innerHTML = "&#x2714;";
      status = true;
    }

    if (partcode == "") {
      document.getElementById("chkpart_code").style.color = "#FF6F00";
      document.getElementById("chkpart_code").innerHTML = "&#x2716; โปรดกรอกข้อมูลรุ่นของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_code").style.color = "#006064";
      document.getElementById("chkpart_code").innerHTML = "&#x2714;";
    }

    if (mday == "") {
      document.getElementById("chkpart_mday").style.color = "#FF6F00";
      document.getElementById("chkpart_mday").innerHTML = "&#x2716; โปรดเลือกวันผลิตของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_mday").style.color = "#006064";
      document.getElementById("chkpart_mday").innerHTML = "&#x2714;";
    }

    if (eday == "") {
      document.getElementById("chkpart_eday").style.color = "#FF6F00";
      document.getElementById("chkpart_eday").innerHTML = "&#x2716; โปรดเลือกวันหมดอายุของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_eday").style.color = "#006064";
      document.getElementById("chkpart_eday").innerHTML = "&#x2714;";
    }

    if (partprice == "") {
      document.getElementById("chkpart_price").style.color = "#FF6F00";
      document.getElementById("chkpart_price").innerHTML = "&#x2716; โปรดกรอกข้อมูลราคาของอะไหล่";
      status = false;
    }else if (partprice < 0) {
      document.getElementById("chkpart_price").style.color = "#FF6F00";
      document.getElementById("chkpart_price").innerHTML = "&#x2716; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkpart_price").style.color = "#006064";
      document.getElementById("chkpart_price").innerHTML = "&#x2714;";
    }

    if (partqty == "") {
      document.getElementById("chkpart_qty").style.color = "#FF6F00";
      document.getElementById("chkpart_qty").innerHTML = "&#x2716; โปรดกรอกข้อมูลจำนวนของอะไหล่";
      status = false;
    }else if (partqty < 0) {
      document.getElementById("chkpart_qty").style.color = "#FF6F00";
      document.getElementById("chkpart_qty").innerHTML = "&#x2716; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkpart_qty").style.color = "#006064";
      document.getElementById("chkpart_qty").innerHTML = "&#x2714;";
    }

    if (parttype == " ") {
      document.getElementById("chkpart_type").style.color = "#FF6F00";
      document.getElementById("chkpart_type").innerHTML = "&#x2716; โปรดเลือกประเภทของอะไหล่";
      return false;
    }else{
      document.getElementById("chkpart_type").style.color = "#006064";
      document.getElementById("chkpart_type").innerHTML = "&#x2714;";
    }

      return status;
  }


  /************************************* Edit Part Management **************************************/
   function epart(){
    var parttype = document.chkepart.part_type.value;
    var mday = document.chkepart.m_day.value;
    var eday = document.chkepart.e_day.value;
    var partbrand = document.chkepart.brand.value;
    var partprice = document.chkepart.price.value;
    var partcode = document.chkepart.code.value;
    var status;

    if (partbrand == "") {
      document.getElementById("chkpart_brand").style.color = "#FF6F00";
      document.getElementById("chkpart_brand").innerHTML = "&#x2716; โปรดกรอกข้อมูลยี่ห้อของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_brand").style.color = "#006064";
      document.getElementById("chkpart_brand").innerHTML = "&#x2714;";
      status = true;
    }

    if (partcode == "") {
      document.getElementById("chkpart_code").style.color = "#FF6F00";
      document.getElementById("chkpart_code").innerHTML = "&#x2716; โปรดกรอกข้อมูลรุ่นของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_code").style.color = "#006064";
      document.getElementById("chkpart_code").innerHTML = "&#x2714;";
    }

    if (mday == "") {
      document.getElementById("chkpart_mday").style.color = "#FF6F00";
      document.getElementById("chkpart_mday").innerHTML = "&#x2716; โปรดเลือกวันผลิตของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_mday").style.color = "#006064";
      document.getElementById("chkpart_mday").innerHTML = "&#x2714;";
    }

    if (eday == "") {
      document.getElementById("chkpart_eday").style.color = "#FF6F00";
      document.getElementById("chkpart_eday").innerHTML = "&#x2716; โปรดเลือกวันหมดอายุของอะไหล่";
      status = false;
    }else{
      document.getElementById("chkpart_eday").style.color = "#006064";
      document.getElementById("chkpart_eday").innerHTML = "&#x2714;";
    }

    if (partprice == "") {
      document.getElementById("chkpart_price").style.color = "#FF6F00";
      document.getElementById("chkpart_price").innerHTML = "&#x2716; โปรดกรอกข้อมูลราคาของอะไหล่";
      status = false;
    }else if (partprice < 0) {
      document.getElementById("chkpart_price").style.color = "#FF6F00";
      document.getElementById("chkpart_price").innerHTML = "&#x2716; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkpart_price").style.color = "#006064";
      document.getElementById("chkpart_price").innerHTML = "&#x2714;";
    }

    if (parttype == " ") {
      document.getElementById("chkpart_type").style.color = "#FF6F00";
      document.getElementById("chkpart_type").innerHTML = "&#x2716; โปรดเลือกประเภทของอะไหล่";
      return false;
    }else{
      document.getElementById("chkpart_type").style.color = "#006064";
      document.getElementById("chkpart_type").innerHTML = "&#x2714;";
    }

      return status;
  }


  /************************************* Delete Part **************************************/
  function dparts(){
    var status;

    if ($('[name=choose]:checked').prop('checked')) {
      document.getElementById("chkdparts_choose").style.color = "#006064";
      document.getElementById("chkdparts_choose").innerHTML = "&#x2714; เลือกอะไหล่ที่ต้องการลบเรียบร้อย";
      status = true;
    } else {
      document.getElementById("chkdparts_choose").style.color = "#FF6F00";
      document.getElementById("chkdparts_choose").innerHTML = "&#x2716; โปรดเลือกอะไหล่ที่ต้องการลบก่อน";
      status = false;
    }
    return status;
  }


  /************************************* Add Depot Management **************************************/
  
  function depot(){
    var depotcapacity = document.chkdepot.capacity.value;
    var depotlocname = document.chkdepot.location_name.value;
    var depotposition = document.chkdepot.depotno.value;
    var depotlv = document.chkdepot.depotlevel.value;
    var depotloc = document.chkdepot.location.value;
    var status;


    if (depotlocname == "") {
      document.getElementById("chkdepot_locname").style.color = "#FF6F00";
      document.getElementById("chkdepot_locname").innerHTML = "&#x2716; โปรดกรอกข้อมูลชื่อตำแหน่งศูนย์ซ่อม";
      status = false;
    }else{
      document.getElementById("chkdepot_locname").style.color = "#006064";
      document.getElementById("chkdepot_locname").innerHTML = "&#x2714;";
      status = true;
    }

    if (depotcapacity == " ") {
      document.getElementById("chkdepot_capacity").style.color = "#FF6F00";
      document.getElementById("chkdepot_capacity").innerHTML = "&#x2716; โปรดเลือกจำนวนที่ศูนย์ซ่อมรับได้";
      status = false;
    }else{
      document.getElementById("chkdepot_capacity").style.color = "#006064";
      document.getElementById("chkdepot_capacity").innerHTML = "&#x2714;";
    }

    if (depotposition == "") {
      document.getElementById("chkdepot_position").style.color = "#FF6F00";
      document.getElementById("chkdepot_position").innerHTML = "&#x2716; โปรดกรอกข้อมูลตำแหน่งศูนย์ซ่อม";
      status = false;
    }else{
      document.getElementById("chkdepot_position").style.color = "#006064";
      document.getElementById("chkdepot_position").innerHTML = "&#x2714;";
      
    }

    if (depotlv == " ") {
      document.getElementById("chkdepot_level").style.color = "#FF6F00";
      document.getElementById("chkdepot_level").innerHTML = "&#x2716; โปรดเลือกระดับการเข้าซ่อมบำรุง"; 
      status = false;
    }else{
      document.getElementById("chkdepot_level").style.color = "#006064";
      document.getElementById("chkdepot_level").innerHTML = "&#x2714;";      
    }

    if (depotloc == " ") {
      document.getElementById("chkdepot_loc").style.color = "#FF6F00";
      document.getElementById("chkdepot_loc").innerHTML = "&#x2716; โปรดเลือกตำแหน่งระยะทาง"; 
      status = false;
    }else{
      document.getElementById("chkdepot_loc").style.color = "#006064";
      document.getElementById("chkdepot_loc").innerHTML = "&#x2714;";      
    }
    
    return status;
  }

  /************************************* Delete Depot Management **************************************/
  function ddepot(){
    var status;

    if ($('[name=choose]:checked').prop('checked')) {
      document.getElementById("chkddepot_choose").style.color = "#006064";
      document.getElementById("chkddepot_choose").innerHTML = "&#x2714; เลือกศูนย์ซ่อมที่ต้องการลบเรียบร้อย";
      status = true;
    } else {
      document.getElementById("chkddepot_choose").style.color = "#FF6F00";
      document.getElementById("chkddepot_choose").innerHTML = "&#x2716; โปรดเลือกศูนย์ซ่อมที่ต้องการลบก่อน";
      status = false;
    }
    return status;
  }

  /****************************************** Check Part In Image **********************************/
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
  