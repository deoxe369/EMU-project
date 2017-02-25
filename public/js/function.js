  /*********************** Relation Between Train Set Type and Composition ***********************/
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

    var status = false;

    if (trsetno == "") {
      document.getElementById("chktrset_no").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chktrset_no").innerHTML = "<img src= 'image/icon/check.png'>";
      status = true;
    }

    if (trsettype == " ") {
      document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลรหัสชุดรถไฟ";
      status = false;
    }else{
      document.getElementById("chktrset_type").innerHTML = "<img src= 'image/icon/check.png'>";
    }
 
    return status;
  }


  /************************************* Add Car Management **************************************/
  function cars(){
    var carsmodel = document.chkcar.cars_model.value;
    var carstype = document.chkcar.cars_type.value;
    var carsprice = document.chkcar.cars_price.value;
    var carsqty = document.chkcar.cars_qty.value;
    var status = false;

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
    }else if (carsprice < 0 ) {
      document.getElementById("chkcars_price").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกราคาเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_price").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    if (carsqty == "") {
      document.getElementById("chkcars_qty").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกข้อมูลจำนวนของตู้รถไฟ";
      status = false;
    }else if (carsqty < 0 ) {
      document.getElementById("chkcars_qty").innerHTML = "<img src= 'image/icon/cancel-music.png'> &nbsp; โปรดกรอกจำนวนเป็นจำนวนเต็มบวก";
      status = false;
    }else{
      document.getElementById("chkcars_qty").innerHTML = "<img src= 'image/icon/check.png'>";
    }

    return status;
  }



    