"use strict";
const viewLinks = document.querySelectorAll(".title");
const openLinks = document.querySelectorAll(".weblink");

for(let i=0;i<viewLinks.length;i++){
  viewLinks[i].addEventListener("click",function(){
    if (!openLinks[i].classList.contains("hidden", "potifolio")) {
      openLinks[i].classList.add("hidden", "potifolio");
    } else {
      openLinks[i].classList.remove("hidden", "potifolio");
    }
  });

}
