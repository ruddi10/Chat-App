var k=0;

function ajaxmatch(e) 
{
    let par = "name=" + username.value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'usercheck.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200) {
            let response = this.responseText;
            if(response.trim() == "true") {
                username.style.border = "2px solid red";
                k++;
            }
            else {
                username.style.border = "2px solid green";
                k = 0;
            }
        }
    }
    xhr.send(par);

}


function validation(e){
    let f=0;
let inputs =document.querySelectorAll(".inputvalue");
inputs.forEach(input=>{
    if(!input.value)
    {
    input.style.border="2px solid red";
    f++;
    }
    else
    input.style.border="none";

    
});
if(k){
    username.style.border="2px solid red";
}
let mail=document.getElementById("mail");
let cmail =document.getElementById("cmail");
var patt=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!(mail.value).match(patt))
{
mail.style.border="2px solid red";
f++;
}
else
mail.style.border="none";
if((mail.value)!==(cmail.value)){
    cmail.style.border="2px solid red";
    f++;  
}
else
cmail.style.border="none";
if(f||k){
    e.preventDefault();
}
}


const form= document.querySelector(".myform");
form.addEventListener("submit",validation);
const username= document.getElementById("user");
username.addEventListener("keyup",ajaxmatch);