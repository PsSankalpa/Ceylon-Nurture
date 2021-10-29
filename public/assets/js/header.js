function myFunction() {
    var x = document.getElementById("myTopnav");
    console.log(x);
    if (x.className === "top_nav") {
      x.className += " responsive";
    } else {
      x.className = "top_nav";
    }
  }


/*window.onscroll = function() {myFunction()};

var header = document.getElementById("myTopnav");
var sticky = header.offsetTop;
var mg_rm = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    header.classList.add("mg-tp-rm");
  } else {
    header.classList.remove("sticky");
    header.classList.remove("mg-tp-rm");
  }
}*/