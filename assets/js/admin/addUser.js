const addUserForm=document.getElementById("addUser-form");
const passwd=document.getElementById("passwd");
const passwdCnf=document.getElementById("passwdCnf");

const emailExists=document.getElementsByClassName("emailExists");
const passwdFail =document.getElementById("passwdFail");






















addUserForm.addEventListener("submit",validateAddUser);
function validateAddUser(e){
    if (passwd.value !=passwdCnf.value) {
        e.preventDefault();
        passwdFail.style.display ='block';
    }
}



function checkEmail(email) {
    var xmlhttpD = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xmlhttpD.open("GET", "validations/emailCheckAjax.php?email="+email, true);
    xmlhttpD.send();
    showHint();
}
