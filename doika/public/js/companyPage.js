window.onload = function() {

    if(document.getElementById("test"))
        document.getElementById("test").addEventListener("click", addLanguage);
    if(document.getElementsByClassName("add-lang__close")[0])
        document.getElementsByClassName("add-lang__close")[0].addEventListener("click", closePopUp);
    if(document.getElementsByClassName("button-delete")[0])
        document.getElementsByClassName("button-delete")[0].addEventListener("click", showAlert);    



	function addLanguage(e) {
        document.getElementsByClassName("popup-background")[0].style.display = "block";
        e.preventDefault();
	}

	function closePopUp(e) {
		document.getElementsByClassName("popup-background")[0].style.display = "none";
		e.preventDefault();
	}

    $(".popup-close").on('click', function(e) {
        closePopUp(e);
    });

    function showAlert(e) {

      if (window.confirm('Выдаліць кампанію?')) {
          return true;
      }
      else
          e.preventDefault();
    }

  	function hideAlert(e) {
  		document.getElementById("alert").style.display = "none";
  		e.preventDefault();
  	}


  $( ".date__input" ).datepicker({
    showOn: "button",
    buttonImage: "images/calendar.png",
    buttonImageOnly: true,
    buttonText: "Select date",
    dateFormat: 'yy-mm-dd',
  });

  $("#photo").on('change',function(e) {

       var f = e.target.files[0];
       var fr = new FileReader();

       fr.onload = function(e2) {
           console.dir(e2);
           $('#image').attr('src', e2.target.result);
       };

       fr.readAsDataURL(f);
   });
};
