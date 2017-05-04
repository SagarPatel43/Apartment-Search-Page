var result;

//Gets DOM element of result for suggestion output
//Gets DOM element for downtown checkbox to add event listener when it is changed
//Gets DOM element for dropdown list to add event listener when it is clicked
function getAllDomElement() {
	time();
	result = document.getElementById("suggestion");
	document.getElementById("privacy").addEventListener("click", showAlert, false);
	document.getElementById("login").addEventListener("click", function() { location.href="login.php"; }, false);
	
	var dom1 = document.getElementById("dt");
	dom1.addEventListener("change", expertSuggestion, false);
	
	var dom2=document.getElementById("dropdown");
	dom2.addEventListener("change", expertSuggestion2, false);
}

//Gets array of elements from size checkboxes and location checkboxes, uses array to check if Downtown and 4 1/2 are checked to output the corresponding suggestion through result's innerHTML
function expertSuggestion() {
	var sizes = document.getElementsByClassName("size");
	var locations = document.getElementsByClassName("location");
	if(sizes[4].checked && locations[1].checked) {
		 result.innerHTML = "It is very difficult to find an apartment larger than 5&frac12; in downtown.";
	}
}

//Gets array of elements from size, location checkboxes and price dropdown menu, uses array to check if size is greater than 4 1/2, price is less than 1000, and location is Downtown, then outputs corresponding suggestion.
function expertSuggestion2() {
	var sizes = document.getElementsByClassName("size");
	var locations = document.getElementsByClassName("location");
	var prices = document.getElementsByClassName("price");
	var sizeRange = sizes[2].checked || sizes[3].checked || sizes[4].checked;
	
	if(sizeRange && prices[2].selected && locations[1].checked) {
		result.innerHTML = "Normally an apartment of 4&frac12; and above costs more than 1000$ in downtown area."; 
	}

}

function time() {
	
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	var day = today.getDate();
	var month = today.getMonth();
	var year = today.getFullYear();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById("time").innerHTML = day + "/" + month + "/" + year + " - " + h + ":" + m + ":" + s + " EDT";
	var t = setTimeout(time, 500);
}

function checkTime(i) {
	if(i<10) {
	i = "0" + i;
	}
	return i;
}

function showAlert() {
	alert("Your information will never be sold or misused. The website builder is not liable for any incorrect information shown on this page -- This is solely a practice website");
}

window.addEventListener("load", getAllDomElement, false);