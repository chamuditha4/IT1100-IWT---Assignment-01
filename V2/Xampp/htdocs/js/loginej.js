function myFunction(form) {
    
    
        
    var x = document.getElementById("Employeerad").checked;
    var y = document.getElementById("Jobseekerrad").checked;
 
    if (x == 1){
        
        form.action = "Employer dashboard.html";
    }else if(y == 1){
        
        form.action = "JobSeekerDash.html";
    }

    
  }