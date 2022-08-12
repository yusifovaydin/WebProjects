function start() {
  katolog();
}

window.onload = start;
window.onscroll = function () {
  scrollfunction()
};

function scrollfunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("header").style.background = "none";
  } else {
    document.getElementById("header").style.background = "none";
  }

}


if(window.matchMedia('(max-width:990px)').matches){

  var opnmenyu = document.querySelector("#buttonmenyu");
  var clsmenyu = document.querySelector("#clsmenyu");
  var menyu = document.querySelector("#openmenyu");
  var admenyu = document.querySelector("#admenyu");

  opnmenyu.addEventListener("click",function(){
    menyu.style.left="0";
    menyu.style.width="60%";
    admenyu.style.display = "block";
  })
  clsmenyu.addEventListener("click",function(){
    menyu.style.left="-80%";
  })

}


var qadinalt = document.querySelector("#qadinalt");
var kisialt = document.querySelector("#kisialt");

var qadinbtn = document.querySelector("#qadin");
var kisibtn = document.querySelector("#kisi");

var woman = document.querySelector("#woman");
var mu2 = document.querySelector("#mu2");
var man = document.querySelector("#man");
var mu3 = document.querySelector("#mu3");
var child = document.querySelector("#child");
var mu4 = document.querySelector("#mu4");
var down = document.querySelector("#down");
var mu5 = document.querySelector("#mu5");
var pres = document.querySelector("#pres");
var mu6 = document.querySelector("#mu6");

var posts = document.querySelector("#posts");
var account = document.querySelector("#account");
var accountmain = document.querySelector("#accountmain");
var postmain = document.querySelector("#postmain");


var editaa1 = document.querySelector("#editaa1");
var editaa2 = document.querySelector("#editaa2");
var editaa3 = document.querySelector("#editaa3");
var editaa4 = document.querySelector("#editaa4");
var editaa5 = document.querySelector("#editaa5");
var editaa6 = document.querySelector("#editaa6");
var editaa7 = document.querySelector("#editaa7");

var editinput1 = document.querySelector("#editinput1");
var editinput2 = document.querySelector("#editinput2");
var editinput3 = document.querySelector("#editinput3");
var editinput4 = document.querySelector("#editinput4");
var editinput5 = document.querySelector("#editinput5");
var editinput6 = document.querySelector("#editinput6");

var editimg1 = document.querySelector("#editimg1");
var editimg2 = document.querySelector("#editimg2");
var editimg3 = document.querySelector("#editimg3");
var editimg4 = document.querySelector("#editimg4");
var editimg5 = document.querySelector("#editimg5");
var editimg6 = document.querySelector("#editimg6");

var editsubmit1 = document.querySelector("#editsubmit1");
var editsubmit2 = document.querySelector("#editsubmit2");
var editsubmit3 = document.querySelector("#editsubmit3");
var editsubmit4 = document.querySelector("#editsubmit4");
var editsubmit5 = document.querySelector("#editsubmit5");
var editsubmit6 = document.querySelector("#editsubmit6");

var endirim = document.querySelector("#endirim");
var endirimalt = document.querySelector("#endirimalt");

var gonderbtn = document.querySelector("#gonderbtn");


function katolog() {
 
	

  mu2.style.display = "none";
  mu3.style.display = "none";
  mu4.style.display = "none";
  mu6.style.display = "none";

  editsubmit1.style.display = "none";
  editsubmit2.style.display = "none";
  editsubmit3.style.display = "none";
  editsubmit4.style.display = "none";
  editsubmit5.style.display = "none";
  editsubmit6.style.display = "none";

  editinput1.style.display = "none";
  editinput2.style.display = "none";
  editinput3.style.display = "none";
  editinput4.style.display = "none";
  editinput5.style.display = "none";
  editinput6.style.display = "none";
	
  endirimalt.style.display = "none";
  gonderbtn.style.display = "none";
	
  
	
  qadinbtn.addEventListener("click",function(){
		qadinalt.style.display = "block";
		kisialt.style.display = "none";
	});
	kisibtn.addEventListener("click",function(){
		qadinalt.style.display = "none";
		kisialt.style.display = "block";
	});

	
	

  editimg1.addEventListener("click", function () {
    if (editsubmit1.style.display == "none") {
      editaa1.style.display = "none";
      editinput1.style.display = "block";
      editsubmit1.style.display = "block";
    } else {
      editaa1.style.display = "block";
      editinput1.style.display = "none";
      editsubmit1.style.display = "none";
    }
  });

  editimg2.addEventListener("click", function () {
    if (editsubmit2.style.display == "none") {
      editaa2.style.display = "none";
      editinput2.style.display = "block";
      editsubmit2.style.display = "block";
    } else {
      editaa2.style.display = "block";
      editinput2.style.display = "none";
      editsubmit2.style.display = "none";
    }
  });

  editimg3.addEventListener("click", function () {
    if (editsubmit3.style.display == "none") {
      editaa3.style.display = "none";
      editinput3.style.display = "block";
      editsubmit3.style.display = "block";
    } else {
      editaa3.style.display = "block";
      editinput3.style.display = "none";
      editsubmit3.style.display = "none";
    }
  });

  editimg4.addEventListener("click", function () {
    if (editsubmit4.style.display == "none") {
      editaa4.style.display = "none";
      editinput4.style.display = "block";
      editsubmit4.style.display = "block";
    } else {
      editaa4.style.display = "block";
      editinput4.style.display = "none";
      editsubmit4.style.display = "none";
    }
  });

  editimg5.addEventListener("click", function () {
    if (editsubmit5.style.display == "none") {
      editaa5.style.display = "none";
      editaa5.style.display = "none";
      editinput5.style.display = "block";
      editsubmit5.style.display = "block";
    } else {
      editaa5.style.display = "block";
      editaa5.style.display = "block";
      editinput5.style.display = "none";
      editsubmit5.style.display = "none";
    }
  });

  editimg6.addEventListener("click", function () {
    if (editsubmit6.style.display == "none") {
      editaa6.style.display = "none";
      editaa7.style.display = "none";
      editinput6.style.display = "block";
      editsubmit6.style.display = "block";
    } else {
      editaa6.style.display = "block";
      editaa7.style.display = "block";
      editinput6.style.display = "none";
      editsubmit6.style.display = "none";
    }
  });

  endirim.addEventListener("click", function () {
    if (endirimalt.style.display == "none"){
      endirimalt.style.display = "block";
      gonderbtn.style.display = "block";
    } else{
      endirimalt.style.display = "none";
      gonderbtn.style.display = "none";
    }
  });


  woman.addEventListener('click', function () {

    if (mu2.style.display === "none") {
      mu2.style.display = "block";
    } else {
      mu2.style.display = "none";
    }
    mu3.style.display = "none";
    mu4.style.display = "none";
    mu6.style.display = "none";
  });
  man.addEventListener('click', function () {
    if (mu3.style.display === "none") {
      mu3.style.display = "block";
    } else {
      mu3.style.display = "none";
    }
    mu2.style.display = "none";
    mu4.style.display = "none";
    mu6.style.display = "none";
  });
  child.addEventListener('click', function () {
    if (mu4.style.display === "none") {
      mu4.style.display = "block";
    } else {
      mu4.style.display = "none";
    }
    mu2.style.display = "none";
    mu3.style.display = "none";
    mu6.style.display = "none";
  });

  pres.addEventListener('click', function () {
    if (mu6.style.display === "none") {
      mu6.style.display = "block";
    } else {
      mu6.style.display = "none";
    }
    mu2.style.display = "none";
    mu3.style.display = "none";
    mu4.style.display = "none";
  });
	
	
  accountmain.style.display = "none";
  posts.addEventListener("click", function () {
    if (postmain.style.display != "none") {
      postmain.style.display = "block";
      accountmain.style.display = "none";
    } else {
      postmain.style.display = "none";
    }
  });

  account.addEventListener("click", function () {
    if (accountmain.style.display != "none") {
      accountmain.style.display = "block";
      postmain.style.display = "none";
    } else {
      accountmain.style.display = "none";
    }
  });


}
