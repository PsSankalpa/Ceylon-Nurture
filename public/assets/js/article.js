/*const track = document.querySelector('.carousel__track');//look the entire doc and serch for this class name
const slides = Array.from(track.children);
const nextButton = document.querySelector('.carousel__button-next');
const prevButton = document.querySelector('.carousel__button-prev');
const dotNav = document.querySelector('.carousel__nav');
const dots = Array.from(dotNav.children);

const track2 = document.querySelector('.article-card'); //look the entire doc and serch for this class name
const card = Array.from(track2.children);
// to check card width
const slideWidth = slides[0].getBoundingClientRect().width;
const cardWidth = card[0].getBoundingClientRect().width;

//arange slides next toeach other
var num = card.length
var n;
/*for(n=0;n<num;n++)
{
    slides[n].style.left = cardWidth*n+"px";  
}*/
/*const setSlidePosition = (card,index) => {
    card.style.left = cardWidth * index + "px";
}
slides.forEach(setSlidePosition);
console.log(nextButton);

//when click left move left

//when click right move right
nextButton.addEventListener('click', e=> {
    const currentSlide = track.querySelector('current-slide');
    const nextSlide = currentSlide.nextElementSibling;
    //move the slide

})
//when click nav indicator move to that slide

*/

let span = document.getElementsByTagName('span');
	let article = document.getElementsByClassName('article-card');
    console.log(article);
	let article_page = Math.ceil(article.length/4);
	let l = 0;
	let movePer = 25.34;
	let maxMove = 203;
	// mobile_view	
	let mob_view = window.matchMedia("(max-width: 768px)");
	if (mob_view.matches)
	 {
	 	movePer = 50.36;
	 	maxMove = 504;
	 }

	let right_mover = ()=>{
		l = l + movePer;
		if (article == 1){l = 0; }
		for(const i of article)
		{
			if (l > maxMove){l = l - movePer;}
			i.style.left = '-' + l + '%';
		}

	}
	let left_mover = ()=>{
		l = l - movePer;
		if (l<=0){l = 0;}
		for(const i of article){
			if (article_page>1){
				i.style.left = '-' + l + '%';
			}
		}
	}
	//span[1].onclick = ()=>{right_mover();}
	//span[0].onclick = ()=>{left_mover();}


	//------------------------------------------------------------
	//for article details
filterSelection("Overview");
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  y = document.getElementsByClassName("active");
  console.log(y);
  if (c == "Overview") c = "";
  for (i = 0; i < x.length; i++) {
	  if(i==x.length-1){
		articleRemoveClass(x[i], "show");
	  }
	  else{
		articleRemoveClass(x[i], "show");
    	if (x[i].className.indexOf(c) > -1) articleAddClass(x[i], "show");
	  }
  }

  for (i = 0; i < x.length; i++) {
	if((c=="Reviews")&&(x[i]==x[x.length-1])){
		articleAddClass(x[i], "show");
		console.log(c);
	  }
  }
  
  console.log(x[x.length-1]);
}

function articleAddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function articleRemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}