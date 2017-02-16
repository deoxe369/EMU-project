  //Relation Between Train Set Type and Composition
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