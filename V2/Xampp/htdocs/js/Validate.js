function Validate() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;
    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}