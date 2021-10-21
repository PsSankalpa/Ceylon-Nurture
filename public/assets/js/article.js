//--------------------------------------------------------------------------------------------
//for carousel
let span = document.getElementsByTagName('span');
let product = document.getElementsByClassName('product')
let product_page = Math.ceil(product.length / 4);
let length1 = product.length;

let l = 0;
let movePer = 25.34;
let maxMove = 203;
// mobile_view	
let mob_view = window.matchMedia("(max-width: 768px)");
if (mob_view.matches) {
	movePer = 50.36;
	maxMove = 504;
}

let right_mover = () => {
	l = l + movePer;
	console.log(l);
	console.log(product);
	if (product == 1) {
		 l = 0; 
		}
	for (const i of product) {
		if (l > maxMove) {
			 l = l - movePer;
			 console.log(l);
			 }
		i.style.left = '-' + l + '%';
	}

}
let left_mover = () => {
	l = l - movePer;
	console.log(l);
	if (l <= 0) { 
		l = 0;
	 }
	for (const i of product) {
		if (product_page >= 1) {
			i.style.left = '-' + l + '%';
		}
	}
}
span[1].onclick = () => { right_mover(); }
span[0].onclick = () => { left_mover(); }
//js code changed
console.log(l);
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
		if (i == x.length - 1) {
			articleRemoveClass(x[i], "show");
		}
		else {
			articleRemoveClass(x[i], "show");
			if (x[i].className.indexOf(c) > -1) articleAddClass(x[i], "show");
		}
	}

	for (i = 0; i < x.length; i++) {
		if ((c == "Reviews") && (x[i] == x[x.length - 1])) {
			articleAddClass(x[i], "show");
			console.log(c);
		}
	}
	for (i = 0; i < x.length; i++) {
		if ((c == "addArticles") && (x[i] == x[x.length - 1])) {
			articleAddClass(x[i], "show");
			console.log(c);
		}
	}


	//console.log(x[x.length - 1]);
}

function articleAddClass(element, name) {
	var i, arr1, arr2;
	arr1 = element.className.split(" ");
	arr2 = name.split(" ");
	for (i = 0; i < arr2.length; i++) {
		if (arr1.indexOf(arr2[i]) == -1) { element.className += " " + arr2[i]; }
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
	btns[i].addEventListener("click", function () {
		var current = document.getElementsByClassName("active");
		current[0].className = current[0].className.replace(" active", "");
		this.className += " active";
	});
}