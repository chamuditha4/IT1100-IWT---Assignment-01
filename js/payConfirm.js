function PayPaypal() {
    var txt;
    var r = confirm("Do you Want to Pay via Paypal?");
    if (r == true) {
        location.replace("Recevied.html")
    } else {
        location.replace("Employer dashboard.html")
    }
    
  }

  function PayCard() {
    var txt;
    var r = confirm("Do you Want to Pay via Card?");
    if (r == true) {
        location.replace("card pay.html")
    } else {
        location.replace("Employer dashboard.html")
    }
    
  }