function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  {
    var x = document.forms["myForm"]["lname"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }

}
}