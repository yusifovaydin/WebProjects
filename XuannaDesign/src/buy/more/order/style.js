var img1 = document.querySelector("#img1");
var img2 = document.querySelector("#img2");

var f1 = document.querySelector("#f1");
var f2 = document.querySelector("#f2");

var h1 = document.querySelector("#h1");
var h2 = document.querySelector("#h2");


f1.addEventListener("click",function(){
    img1.style.display = "block";
    img2.style.display = "none";
    f2.style.opacity = ".6";
    f1.style.opacity = "1";
    h1.style.display = "block";
    h2.style.display = "none";
});
f2.addEventListener("click",function(){
    img1.style.display = "none";
    img2.style.display = "block";
    f1.style.opacity = ".6";
    f2.style.opacity = "1";
    h1.style.display = "none";
    h2.style.display = "block";
});


var loc1 = document.querySelector("#loc1");
var locimg1 = document.querySelector("#loc1 img");

var loc2 = document.querySelector("#loc2");
var locimg2 = document.querySelector("#loc2 img");

var span = document.querySelector("#span");

var valst = document.querySelector("#val");
var valfrst = Number(valst.textContent);
var val = Number(valst.textContent);

var sendprice = document.querySelector("input[name='price']");
sendprice.value = val;

loc1.addEventListener("click",function(){
    if(locimg1.style.display == "block"){
        locimg1.style.display ="none";
        span.innerHTML="";
        valst.innerHTML = val - 3;
        sendprice.value = val - 3;
        val = val - 3;
    }else{
        locimg1.style.display ="block";
        locimg2.style.display ="none";
        span.innerHTML="(+3 AZN)";
        val = valfrst;
        valst.innerHTML = val + 3;
        sendprice.value = val + 3;

        val = val + 3;
    }
    
})
loc2.addEventListener("click",function(){
    if(locimg2.style.display == "block"){
        locimg2.style.display ="none";
        span.innerHTML="";
        valst.innerHTML = val - 10;
        sendprice.value = val - 10;
        val = val - 10;

    }else{
        locimg2.style.display ="block";
        locimg1.style.display ="none";
        span.innerHTML="(+10 AZN)";
        val = valfrst;
        valst.innerHTML = val + 10;
        sendprice.value = val + 10;
        val = val + 10;

    }
})