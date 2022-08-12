
if(window.matchMedia('(max-width:900px)').matches){

    var opnmenyu = document.querySelector("#buttonmenyu");
    var clsmenyu = document.querySelector("#clsmenyu");
    var menyu = document.querySelector("#openmenyu");
    var admenyu = document.querySelector("#admenyu");

    opnmenyu.addEventListener("click",function(){
        menyu.style.left="0";
        menyu.style.width="60%";
        admenyu.style.display="block";
    });
    clsmenyu.addEventListener("click",function(){
        menyu.style.left= "-80%";
    })
    
}