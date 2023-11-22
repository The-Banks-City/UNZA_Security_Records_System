"use strict";
/*
let imgnum = 1;
//right button code
document.querySelector(".btn-right").addEventListener("click", function () {
  console.log("click");
  if (imgnum <= 4) {
    document.querySelector(`.image${imgnum}`).classList.add("hidden");
    document.querySelector(`.gallery-cap${imgnum}`).classList.add("hidden");
    imgnum++;
    if (imgnum === 5) {
      imgnum = 1;
    }
    document.querySelector(`.image${imgnum}`).classList.remove("hidden");
    document.querySelector(`.gallery-cap${imgnum}`).classList.remove("hidden");
  }
});

//left button code
document.querySelector(".btn-left").addEventListener("click", function () {
  if (imgnum >= 1 && imgnum < 5) {
    document.querySelector(`.image${imgnum}`).classList.add("hidden");
    document.querySelector(`.gallery-cap${imgnum}`).classList.add("hidden");
    imgnum--;
    if (imgnum === 0) {
      imgnum = 4;
    }
    document.querySelector(`.image${imgnum}`).classList.remove("hidden");
    document.querySelector(`.gallery-cap${imgnum}`).classList.remove("hidden");
  }
});

*/

//Modified code
let imgnum = 1;
//right button code
let btn_right = document.querySelector(".btn-right");
let img_num = document.querySelector(`.image${imgnum}`);
let cap_num = document.querySelector(`.gallery-cap${imgnum}`);


btn_right.addEventListener("click", function () {
  console.log("click");
  if (imgnum <= 4) {
    img_num.classList.add("hidden");
    cap_num.classList.add("hidden");
    imgnum++;
    if (imgnum === 5) {
      imgnum = 1;
    }
    img_num.classList.remove("hidden");
    cap_num.classList.remove("hidden");
  }
});

//left button code
document.querySelector(".btn-left").addEventListener("click", function () {
  if (imgnum >= 1 && imgnum < 5) {
    img_num.classList.add("hidden");
    cap_num.classList.add("hidden");
    imgnum--;
    if (imgnum === 0) {
      imgnum = 4;
    }
    img_num.classList.remove("hidden");
    cap_num.classList.remove("hidden");
  }
});