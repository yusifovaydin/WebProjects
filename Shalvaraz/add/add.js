function start(){
	katolog();
}

window.onload = start;

window.onscroll = function(){scrollfunction()};

function scrollfunction(){
	if(document.body.scrollTop>50 || document.documentElement.scrollTop>50){
		document.getElementById("header").style.background = "none";
	}else{
		document.getElementById("header").style.background = "none";
	}
	
}

var qadinalt = document.querySelector("#qadinalt");
var kisialt = document.querySelector("#kisialt");

var qadinbtn = document.querySelector("#qadin");
var kisibtn = document.querySelector("#kisi");

var sizebtn = document.querySelector("#sizebtn");
var sizealt = document.querySelector("#sizealt");

function katolog(){
		
	sizebtn.addEventListener("click",function(){
		if(sizealt.style.display === "none"){
			sizealt.style.display = "block";
			sizebtn.style.color = "white";
			sizebtn.style.background = "black";
		}else{
			sizealt.style.display = "none";
			sizebtn.style.color = "black";
			sizebtn.style.background = "white";
		}
	});
	
	qadinbtn.addEventListener("click",function(){
		qadinalt.style.display = "block";
		kisialt.style.display = "none";
	});
	kisibtn.addEventListener("click",function(){
		qadinalt.style.display = "none";
		kisialt.style.display = "block";
	});

	
}


