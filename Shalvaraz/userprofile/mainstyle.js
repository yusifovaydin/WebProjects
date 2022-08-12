function start(){
	main();
}

var posts = document.querySelector("#posts");
var postmain = document.querySelector("#postmain");
var account = document.querySelector("#account");
var accountmain = document.querySelector("#accountmain");

function main(){
	postmain.style.display="block";
	accountmain.style.display="none";
	posts.addEventListener("click",function(){
		if(postmain.style.display==="none"){
			postmain.style.display="block";
		}else{
			postmain.style.display="none";
		}
		accountmain.style.display="none";

	});
	account.addEventListener("click",function(){
		if(accountmain.style.display==="none"){
			accountmain.style.display="block";
		}else{
			accountmain.style.display="none";
		}
			postmain.style.display="none";		
	});
}



window.onload = start;

var woman = document.querySelector("#woman");
var mu2 = document.querySelector("#mu2");
var man = document.querySelector("#man");
var mu3 = document.querySelector("#mu3");
var child = document.querySelector("#child");
var mu4 = document.querySelector("#mu4");

mu2.style.display="none";
mu3.style.display="none";
mu4.style.display="none";

function menyu(){
	woman.addEventListener('click',function(){
		if(mu2.style.display === "none"){
			mu2.style.display = "block";
		}
		else{
			mu2.style.display = "none";
		}
		mu3.style.display = "none";
		mu4.style.display = "none";
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
	});

}


var qadinalt = document.querySelector("#qadinalt");
var kisialt = document.querySelector("#kisialt");
var usaqalt = document.querySelector("#usaqalt");
var endirimalt = document.querySelector("#endirimalt");

var qadinbtn = document.querySelector("#qadin");
var kisibtn = document.querySelector("#kisi");
var usaqbtn = document.querySelector("#usaq");
var endirimbtn = document.querySelector("#endirim");

function katolog(){
	
	qadinbtn.addEventListener("click",function(){
		qadinalt.style.display = "block";
		kisialt.style.display = "none";
		usaqalt.style.display = "none";

	});
	kisibtn.addEventListener("click",function(){
		qadinalt.style.display = "none";
		kisialt.style.display = "block";
		usaqalt.style.display = "none";

	});
	usaqbtn.addEventListener("click",function(){
		qadinalt.style.display = "none";
		kisialt.style.display = "none";
		usaqalt.style.display = "block";

	});
	endirimbtn.addEventListener("click",function(){
		if(endirimalt.style.display === "block"){
			endirimalt.style.display = "none";
		}else{
			endirimalt.style.display = "block";
		}
	});
	
	
}

var oldval = document.querySelector("#oldval");
var newval = document.querySelector("#newval");

function endirim(){
	if( newval.value > oldval.value){
		newval.setCostumValidity("Yeni qiymət köhnə qiymətdən böyük ola bilməz!");
	}else if( newval.value === oldval.value){
		newval.setCostumValidity("Yeni qiymət köhnə qiymətlə bərabər ola bilməz!");
	}
}
