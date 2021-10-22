function myFunction() {
    var x = document.getElementById("myTopnav");
    console.log(x);
    if (x.className === "top_nav") {
      x.className += " responsive";
    } else {
      x.className = "top_nav";
    }
  }