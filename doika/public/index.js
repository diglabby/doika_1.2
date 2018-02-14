window.onload = function(){
	document.getElementById("test").addEventListener("click", addLanguage);
	document.getElementsByClassName("add-lang__close")[0].addEventListener("click", closePopUp);

	function addLanguage(e) {
	document.getElementsByClassName("popup-background")[0].style.display = "block";
	e.preventDefault();
	}

	function closePopUp(e) {
		document.getElementsByClassName("popup-background")[0].style.display = "none";
		e.preventDefault();
	}
};