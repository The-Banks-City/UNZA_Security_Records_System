function showHideOption() {
    var selectBox = document.getElementById("location");
    var conditionalOption = document.getElementById("school");
    var conditionalOption1 = document.getElementById("hostels");
  
    if (selectBox.value === "school") {
      conditionalOption.style.display = "block"; // Show the option
      conditionalOption1.style.display = "none";
    }
    else if (selectBox.value === "hostel") {
      conditionalOption1.style.display = "block"; // Show the option
        conditionalOption.style.display = "none";
    } else {
      conditionalOption.style.display = "none"; // Hide the option
      conditionalOption1.style.display = "none";
    }
  }

  document.addEventListener("contextmenu",function(event){
    event.preventDefault();
});