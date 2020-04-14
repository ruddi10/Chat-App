var tosend;
var f;
function ser(e){
    e.preventDefault();
    clearInterval(f);
    let mssg= myform.querySelector(".messa");
    let par= "receiver="+tosend+"&message="+encodeURIComponent(mssg.value);
    let xhr= new XMLHttpRequest();
   xhr.open("POST","sendprocess.php");
   xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload=function () {
    if (this.status == 200){
        console.log(this.responseText);
    }
}
xhr.send(par);
mssg.value="";
sendi();
    f= setInterval(sendi,10000);
}
function sendi(){
    let xhr= new XMLHttpRequest();
  xhr.open("GET","chatprocess.php?receiver="+tosend);
  xhr.onload=function () {
   if (this.status == 200){
       let data=JSON.parse(this.responseText);
       let boy=document.querySelector(".mainarea");
       boy.innerHTML="";
       data.forEach(
           function(d){
               
               if(d.sender==tosend){
                   boy.innerHTML+=`<div class="received">${d.message}</div>`;
               }
               else
               boy.innerHTML+=`<div class="sent">${d.message}</div>`;
           }
       )
    }
}
xhr.send();
}
function chatin(e){
    let k;
if(e.target.className=='userwrap')
  k =e.target;
  else 
   k=e.target.parentNode;
  let user=k.querySelector(".username");
  let profile= k.querySelector(".userimage");
  tosend=user.innerHTML;
  document.querySelector(".no").style.display="none";
  document.querySelector(".mainarea").style.display="flex";
  document.querySelector(".head").innerHTML=`<img class="userimage1" src="${profile.src}"><div class="text">${user.innerHTML}</div>`;
  document.querySelector(".head").style.display="flex";
  sendi();
 f= setInterval(sendi,10000);
  

}

var userwrap= document.querySelectorAll(".userwrap");
userwrap.forEach(u=>u.addEventListener("click",chatin));
var form = document.getElementById("myform");
form.addEventListener("submit",ser)