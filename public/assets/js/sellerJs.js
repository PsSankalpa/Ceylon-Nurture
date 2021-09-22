function registrationForm() {
    document.getElementById("sellerForm").style.display = "block";
  }
  
  function closeRegistrationForm() {
    document.getElementById("sellerForm").style.display = "none";
  }

  function products() {
    document.getElementById("productForm").style.display = "block";
  }
  
  function closeproductForm() {
    document.getElementById("productForm").style.display = "none";
  }

  function closebutton() {
    document.getElementsByClassName("closebtn").style.display = "none";
  }

  //for error box
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}