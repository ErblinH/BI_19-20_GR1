let result=0;
onmessage = function(e) {
  console.log('Worker: Message received from main script');
 
  result=result+1;
  console.log(result)
  
    postMessage(result);
  
}
setTimeout=function(){
timer=setInterval(function () {
    onmessage();
},1000);}
setTimeout();
