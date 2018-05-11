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
    if (document.getElementById( "progress-start" ) !== null) {
        var progress_start = document.getElementById( "progress-start" ).innerHTML; 
        var progress_end = document.getElementById( "progress-end" ).innerHTML;
        $( ".progress-bar__indicator" ).width((progress_start * $( ".progress-bar" ).width()) / progress_end);
    }
    
    var copyTextareaBtn = document.querySelector('#shortcode__copy');
    if(copyTextareaBtn) {
        copyTextareaBtn.addEventListener('click', function(e) {     
          var copyTextarea = document.querySelector('#shortcode');
          copyTextarea.focus();
          copyTextarea.select();

          try {
            var successful = document.execCommand('copy');       
          } catch (err) {
            
          }      
        }); 
    }    

  $( ".date__input" ).datepicker({
    showOn: "button",
    buttonImage: "images/calendar.png",
    buttonImageOnly: true,
    buttonText: "Select date",
    dateFormat: 'yy-mm-dd',
  });

  if($(".progress_bar_checkbox").checked) {
    $(".toggler__label").text("Уключыць прагрэс-бар");
  }
  else {
    $(".toggler__label").text("Выключыць прагрэс-бар");
  }



  $(".progress_bar_checkbox").change(function() {
    if(this.checked) {
      $(".toggler__label").text("Выключыць прагрэс-бар");
    }
    else {
      $(".toggler__label").text("Уключыць прагрэс-бар");
    }
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
