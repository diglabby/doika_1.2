(function() {

  var sum = 0;

  function loadConfig() {
       AJAXRequest(`/doika/client-${window.parent.doika.companyId}`, setConfigHTML)
  }

  function loadDataConfig() {
     AJAXRequest(`/doika/client-${window.parent.doika.companyId}`, setConfigData)
  }

  function setConfigData(data) {
      dataConfig =  data;
  }

  function setConfigHTML(data) {
    document.getElementsByClassName("module-donate__title")[0].innerText = data.innerText.companyTitle;
    document.getElementsByClassName("module-donate__description")[0].innerHTML = data.innerText.companyDescription;

    document.getElementsByClassName("progress-bar__track")[0].style.width = data.currentFunds + "px";
    document.getElementsByClassName("module-donate__button-confirm")[0].innerText = data.innerText.acceptButtonText;
    document.getElementsByClassName("module-donate__text-input")[0].placeholder = data.innerText.textInputPlaceholder;
    document.getElementsByClassName("mainImage")[0].src = 'assets/img/' + data.innerText.titleImage;
    document.getElementsByClassName("payment__description")[0].innerText = data.innerText.paymentDescriptionTitle;
    document.getElementsByClassName("result__description")[0].insertAdjacentHTML( 'beforeend', data.innerText.resultsText);

    document.getElementById('module-donate').style.backgroundColor = data.backgroundColor;
    var buttons = document.getElementsByTagName('button');
    for( var i = 0; i < buttons.length; i++) {
      buttons[i].style.backgroundColor = data.buttonColor;
      buttons[i].style.backgroundColor = data.buttonColor;
      buttons[i].style.backgroundColor = data.buttonColor;
      buttons[i].style.fontSize = data.buttonFontSize;
      buttons[i].style.color = data.buttonTextColor;
    }


    document.getElementsByClassName("module-donate__title")[0].style.color = data.titleTextColor;
    document.getElementsByClassName("module-donate__title")[0].style.fontSize = data.titleFontSize;

    document.getElementsByClassName("module-donate__description")[0].style.color = data.descriptionTextColor;
    document.getElementsByClassName("module-donate__description")[0].style.fontSize = data.descriptionFontSize;

    updateIframeHeight()
  }

  function AJAXRequest(url, callback) {
        var request = new XMLHttpRequest();
        request.open('GET', url, true);

        request.onreadystatechange = function() {
          if (request.readyState === 4) {
            if (request.status >= 200 && request.status < 300) {
              var data = JSON.parse(request.responseText);
              return callback(data);
            }
          }
        };
        request.send();
  }

  function hideAlert() {
    document.getElementsByClassName("module-donate__warning")[0].classList.remove("opened");
    document.getElementsByClassName("module-donate__text-input")[0].classList.remove("warning-open");
    document.getElementsByClassName("module-donate__button-confirm")[0].classList.remove("warning-open");
  }

  function showAlert() {
    document.getElementsByClassName("module-donate__warning")[0].classList.add("opened");
    document.getElementsByClassName("module-donate__text-input")[0].classList.add("warning-open");
    document.getElementsByClassName("module-donate__button-confirm")[0].classList.add("warning-open");
  }


  function takeSum(e) {
    if ( e.target.tagName === "BUTTON" && e.target.hasAttribute("data-sum") ) {

      if (e.target.classList.contains("clicked")) {
        sum = 0;
        e.target.classList.remove("clicked");
      }
      else {
        var buttons = document.getElementsByClassName("module-donate__button-select");
        for (var i = 0; i < buttons.length; i++) {
          buttons[i].classList.remove("clicked");
        }
        sum = e.target.getAttribute("data-sum");
        e.target.classList.add("clicked");
        hideAlert();
        document.getElementsByClassName("module-donate__text-input")[0].value = "";
      }
    }
  }

  function calculateSumm(e) {
    if ( e.target.tagName === "INPUT" ) {
      var buttons = document.getElementsByClassName("module-donate__button-select");
      for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("clicked");
      }

      sum = e.target.value;

      hideAlert();
    }
  }

  function submitbutton() {

    if(!sum) {
      document.getElementsByClassName("module-donate__warning")[0].innerHTML = "Сума не абрана альбо не ўведзена!";
      showAlert();
    } else if ( sum > dataConfig.maxDonateAmount) {
      document.getElementsByClassName("module-donate__warning")[0].innerHTML = 'Ахвяраванне не можа быць большым за '+ dataConfig.maxDonate +' руб!';
      showAlert();
    } else if ( sum < dataConfig.minDonateAmount) {
      document.getElementsByClassName("module-donate__warning")[0].innerHTML = 'Ахвяраванне не можа быць меньшым за '+ dataConfig.minDonate +' руб!';
      showAlert();
    } else {
      window.parent.postMessage(['doikaSubmit', sum], '*')
    }
  }

  function init() {

    document.querySelector(".module-donate__input").addEventListener("click", takeSum);
    document.querySelector(".module-donate__text-input").addEventListener("keyup", calculateSumm);
    document.querySelector(".module-donate__button-confirm").addEventListener("click", submitbutton);
    document.querySelector(".payment__description").addEventListener("click", PopUpShow);
    loadDataConfig();
    loadConfig();
  }

  window.addEventListener("load", init);

  function PopUpShow() {
    window.parent.postMessage(['openPopUp', true], '*')
  }

  function updateIframeHeight() {
    window.parent.postMessage(['updateIframeHeight', true], '*')
  }

}());
