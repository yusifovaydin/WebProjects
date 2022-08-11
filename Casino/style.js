var login = document.querySelector("#login");
var regs = document.querySelector("#regs");
var rest = document.querySelector("#rest");

var loginclose = document.querySelector("#login img");
var regsclose = document.querySelector("#regs img");
var restclose = document.querySelector("#rest img");

var loginbtn = document.querySelector("#headerleft a");
var body = document.querySelector("body");


var logs1 = document.querySelector("#logs1");
var logs2 = document.querySelector("#logs2");
var regss1 = document.querySelector("#regss1");
var regss2 = document.querySelector("#regss2");
var rests1 = document.querySelector("#rests1");
var rests2 = document.querySelector("#rests2");

loginbtn.addEventListener("click",function(){
    login.style.opacity = "1";
    login.style.height = "100%";
    login.style.display = "block";
    body.style.overflow = "hidden";
});
loginclose.addEventListener("click",function(){
    login.style.display = "none";
    login.style.opacity = "0";
    body.style.overflow = "visible";
    
});
regsclose.addEventListener("click",function(){
    regs.style.display = "none";
    regs.style.opacity = "0";
    body.style.overflow = "visible";
});
restclose.addEventListener("click",function(){
    rest.style.display = "none";
    rest.style.opacity = "0";
    body.style.overflow = "visible";
});

logs1.addEventListener("click",function(){
    console.log("logn1");
    login.style.display = "block";
    login.style.opacity = "1";
    login.style.height = "100%";
    regs.style.display = "none";
    regs.style.opacity = "0";
    regs.style.hegiht = "0%";
    rest.style.display = "none";
    rest.style.opacity = "0";
    rest.style.hegiht = "0%";
});
logs2.addEventListener("click",function(){
    console.log("logn2");
    login.style.display = "block";
    login.style.opacity = "1";
    login.style.height = "100%";
    regs.style.display = "none";
    regs.style.opacity = "0";
    regs.style.hegiht = "0%";
    rest.style.display = "none";
    rest.style.opacity = "0";
    rest.style.hegiht = "0%";
});
regss1.addEventListener("click",function(){
    console.log("regs1");
    regs.style.display = "block";
    regs.style.opacity = "1";
    regs.style.hegiht = "100%";
    login.style.display = "none";
    login.style.opacity = "0";
    login.style.height = "0%";
    rest.style.display = "none";
    rest.style.opacity = "0";
    rest.style.hegiht = "0%";
});
regss2.addEventListener("click",function(){
    console.log("regs2");
    regs.style.display = "block";
    regs.style.opacity = "1";
    regs.style.hegiht = "100%";
    login.style.display = "none";
    login.style.opacity = "0";
    login.style.height = "0%";
    rest.style.display = "none";
    rest.style.opacity = "0";
    rest.style.hegiht = "0%";
});
rests1.addEventListener("click",function(){
    console.log("rest1");
    rest.style.display = "block";
    rest.style.opacity = "1";
    rest.style.hegiht = "100%";
    login.style.display = "none";
    login.style.opacity = "0";
    login.style.height = "0%";
    regs.style.display = "none";
    regs.style.opacity = "0";
    regs.style.hegiht = "0%";
});
rests2.addEventListener("click",function(){
    console.log("rest2");
    rest.style.display = "block";
    rest.style.opacity = "1";
    rest.style.hegiht = "100%";
    login.style.display = "none";
    login.style.opacity = "0";
    login.style.height = "0%";
    regs.style.display = "none";
    regs.style.opacity = "0";
    regs.style.hegiht = "0%";
});
