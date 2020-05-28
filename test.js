function k(){
 

var sion=document.getElementById("container");
var as=document.createElement('a');
as.setAttribute('href',"#bigArticle")
as.innerHTML="read more";
var kk=document.createElement('div');
kk=sion.innerHTML;
sion.appendChild(as);

var sion1=document.getElementById("dd");
var as1=document.createElement('a');
as1.innerHTML="read more"
var kk1=document.createElement('div');
kk1=sion1.innerHTML;
sion1.appendChild(as1);

as.addEventListener('click',function(e){
    
    document.getElementById("bigArticle").innerHTML=kk;
    document.getElementById("gov").style.width="80%";

})

as1.addEventListener('click',function(e){
    
    document.getElementById("bigArticle").innerHTML=kk1;
})

}
window.addEventListener('load',k)