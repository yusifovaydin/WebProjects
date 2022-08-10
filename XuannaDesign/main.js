var button2 = document.querySelector("#button2");
var button3 = document.querySelector("#button3");
var button4 = document.querySelector("#button4");
var button5 = document.querySelector("#button5");

var cooming = document.querySelector("#cooming");


button2.addEventListener("click",function(){
    cooming.style.display="flex";
})
button3.addEventListener("click",function(){
    cooming.style.display="flex";
})
button4.addEventListener("click",function(){
    cooming.style.display="flex";
})
button5.addEventListener("click",function(){
    cooming.style.display="flex";
})

cooming.addEventListener("click",function(){
    cooming.style.display="none";
})