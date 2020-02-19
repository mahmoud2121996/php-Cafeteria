const addUserForm=document.getElementById("addUser-form");
const passwd=document.getElementById("passwd");
const passwdCnf=document.getElementById("passwdCnf");


const email =document.getElementById("email");
const emailExists=document.getElementsByClassName("emailExists")[0];
const passwdFail =document.getElementById("passwdFail");






















email.addEventListener("blur",checkEmail);
window.addEventListener("load",checkEmail);
        
    
addUserForm.addEventListener("submit",validateAddUser);
function validateAddUser(e){
    if (passwd.value !=passwdCnf.value) {
        e.preventDefault();
        passwdFail.style.display ='block';
    }else{
        passwdFail.style.display ='none';
    }
    if (emailExists.style.display =='block') {
        e.preventDefault();
    }
        
    
}



function checkEmail() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText !=""){
                emailExists.style.display ='block';
            }else{
                emailExists.style.display ='none';
            }
        }
    };
    xmlhttp.open("GET", "validations/emailCheckAjax.php?email="+email.value, true);
    xmlhttp.send();
}
