function toggleFunc2() {
    let liItem2 = document.getElementById("menuLi2");             
    liItem2.classList.toggle("mm-active");

    let x2 = document.getElementById("menuLiAn2").getAttribute("aria-expanded"); 
    if (x2 == "true") 
    {
    x2 = "false"
    } else {
    x2 = "true"
    }
    document.getElementById("menuLiAn2").setAttribute("aria-expanded", x2);

    let liUlItem2 = document.getElementById("menuLiUl2");
    liUlItem2.classList.toggle("mm-show");

    let height2 = document.getElementById("menuLiUl2").style.height;
    if(height2 == ""){
        height2 = "0px";
    }else{
        height2 = "";
    }

    document.getElementById("menuLiUl2").style.height = height2;
  
}

function toggleFunc1() {
    let liItem1 = document.getElementById("menuLi1");             
    liItem1.classList.toggle("mm-active");

    let x1 = document.getElementById("menuLiAn1").getAttribute("aria-expanded"); 
    if (x1 == "true") 
    {
    x1 = "false"
    } else {
    x1 = "true"
    }
    document.getElementById("menuLiAn1").setAttribute("aria-expanded", x1);

    let liUlItem1 = document.getElementById("menuLiUl1");
    liUlItem1.classList.toggle("mm-show");

    let height1 = document.getElementById("menuLiUl1").style.height;
    if(height1 == ""){
        height1 = "0px";
    }else{
        height1 = "";
    }

    document.getElementById("menuLiUl1").style.height = height1;
  
}

function toggleFunc() {
    var liItem = document.getElementById("menuLi");             
    liItem.classList.toggle("mm-active");

    var x = document.getElementById("menuLiAn").getAttribute("aria-expanded"); 
    if (x == "true") 
    {
    x = "false"
    } else {
    x = "true"
    }
    document.getElementById("menuLiAn").setAttribute("aria-expanded", x);

    var liUlItem = document.getElementById("menuLiUl");
    liUlItem.classList.toggle("mm-show");

    var height = document.getElementById("menuLiUl").style.height;
    if(height == ""){
        height = "0px";
    }else{
        height = "";
    }

    document.getElementById("menuLiUl").style.height = height;
  
}


setTimeout(() => document.querySelector('.alert').remove(), 3000);
