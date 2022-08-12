
window.onscroll = function(){scrollfunction()};

function scrollfunction(){
	if(document.body.scrollTop>50 || document.documentElement.scrollTop>50){
		document.getElementById("header").style.background = "none";
	}else{
		document.getElementById("header").style.background = "none";
	}
	
}

const ekranphone = window.matchMedia('(max-width:990px)');

if(ekranphone.matches){
	var menyu = document.querySelector("#openmenyu");
	var opnmenyu = document.querySelector("#buttonmenyu");
	var clsmenyu = document.querySelector("#clsmenyu");
	var admenyu = document.querySelector("#admenyu");

	opnmenyu.addEventListener("click",function(){
		menyu.style.left="0%";
		menyu.style.width="60%";
		admenyu.style.display="block";
		clsmenyu.style.display="block";
	});
	clsmenyu.addEventListener("click",function(){
		menyu.style.left="-80%";
	})
}



var woman = document.querySelector("#woman");
var mu2 = document.querySelector("#mu2");
var man = document.querySelector("#man");
var mu3 = document.querySelector("#mu3");
var child = document.querySelector("#child");
var mu4 = document.querySelector("#mu4");
var pres = document.querySelector("#pres");
var mu6 = document.querySelector("#mu6");
mu2.style.display="none";
mu3.style.display="none";
mu4.style.display="none";
mu6.style.display="none";


	woman.addEventListener('click',function(){
		
		if(mu2.style.display === "none"){
			mu2.style.display = "block";
		}
		else{
			mu2.style.display = "none";
		}
		mu3.style.display = "none";
		mu4.style.display = "none";
		mu6.style.display = "none";
	});
	man.addEventListener('click',function(){
		if(mu3.style.display === "none"){
			mu3.style.display = "block";
		}
		else{
			mu3.style.display = "none";
		}
		mu2.style.display = "none";
		mu4.style.display = "none";
		mu6.style.display = "none";
	});
	child.addEventListener('click',function(){
		if(mu4.style.display === "none"){
			mu4.style.display = "block";
		}
		else{
			mu4.style.display = "none";
		}
		mu2.style.display = "none";
		mu3.style.display = "none";
		mu6.style.display = "none";
	});
	pres.addEventListener('click',function(){
		if(mu6.style.display === "none"){
			mu6.style.display = "block";
		}
		else{
			mu6.style.display = "none";
		}		
		mu2.style.display = "none";
		mu3.style.display = "none";
		mu4.style.display = "none";
	});

