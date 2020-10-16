function BOC() {
    document.getElementById("image").src = "aa.png";
}
function COM() {
    document.getElementById("image").src = "bb.jpg";
}
function pay() {
    var txt;
    var r = confirm("Do you Want to go back?");
    if (r == true) {
        location.replace("pay.html")
    } else {
      
    }
    
  }