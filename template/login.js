function validation() 
{ 
    var id=document.f1.user.value; 
    var ps=document.f1.pass.value; 
    var role=document.f1.role.value; 
    if(id.length=="" && ps.length=="" && role.length=="") 
    { 
        alert("Role, username and Password fields are empty"); 
        return false; 
    } 
    else 
    { 
        if(role.length=="") 
        { 
            alert("User Role is empty"); 
            return false; 
        } 
        if (ps.length=="") 
        { 
            alert("Password field is empty"); 
            return false; 
        } 
        if (ps.length=="") 
        { 
            alert("Password field is empty"); 
            return false; 
        } 
    } 
} 