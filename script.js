function show_reg_form(){
    document.getElementById("reg").style.display="block";
    document.getElementById("log").style.display="none";
    document.getElementById("users").style.display="none";
    document.getElementById("content").innerHTML='';
}

function show_log_form(){
    document.getElementById("log").style.display="block";
    document.getElementById("reg").style.display="none";
    document.getElementById("users").style.display="none";
    document.getElementById("content").innerHTML='';
}

function register(login, pass, confirm, email){
    var obj=new XMLHttpRequest();
    obj.onreadystatechange=function(){
        if(obj.readyState==4&&obj.status==200){
            var content=document.getElementById('content');
            content.innerHTML=obj.responseText;
        }
    };
    url= 'http://localhost/authAttach/register.php';
    if(login!==undefined){
        url+='?login='+login+'&';
    }
    if(pass!==undefined){
        url+='pass='+pass+'&';
    }
    if(confirm!==undefined){
        url+='confirm='+confirm+'&';
    }
    if(email!==undefined){
        url+='email='+email;
    }
    obj.open('GET', url, true);
    obj.send();
}
function log_in(login, pass){
    var obj=new XMLHttpRequest();
    obj.onreadystatechange=function(){
        if(obj.readyState==4&&obj.status==200){
            var content=document.getElementById('content');
            content.innerHTML=obj.responseText;
        }
    };
    url= 'http://localhost/authAttach/login.php';
    if(login!==undefined){
        url+='?login='+login+'&';
    }
    if(pass!==undefined){
        url+='pass='+pass;
    }
    
    obj.open('GET', url, true);
    obj.send();
}
function showUsers(){
    document.getElementById("log").style.display="none";
    document.getElementById("reg").style.display="none";
    document.getElementById("users").style.display="block";
    var obj=new XMLHttpRequest();
    obj.onreadystatechange=function(){
        if(obj.readyState==4&&obj.status==200){
            var content=document.getElementById('content');
            content.innerHTML=obj.responseText;
        }
    };
    url= 'http://localhost/authAttach/showUsers.php?action=showUsers';
    
    obj.open('GET', url, true);
    obj.send();
}

function deleteUser(id){
    var obj=new XMLHttpRequest();
    obj.onreadystatechange=function(){
        if(obj.readyState==4&&obj.status==200){
            var content=document.getElementById('content');
            content.innerHTML=obj.responseText;
            showUsers();
        }
    };
    url= 'http://localhost/authAttach/deleteUser.php';
    if(id!==undefined){
        url+='?id='+id;
    }
    obj.open('GET', url, true);
    obj.send();
}
