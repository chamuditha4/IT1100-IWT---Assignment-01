window.onload = function() {
    today();
    function today(){
        var get_date = new Date();
        var date = get_date.getDate()+'/'+(get_date.getMonth()+1)+'/'+get_date.getFullYear();
        
        document.getElementById("today").innerHTML=date;
        document.getElementById('today').style.fontSize = "larger";
        document.getElementById('today').style.color = "white";
    };
}
