(function() {



  function loadConfig() {
       AJAXRequest(`/doika/client-${window.parent.doika.companyId}`, setConfigHTML)
  }

  function loadDataConfig() {
     AJAXRequest(`/doika/client-${window.parent.doika.companyId}`, setConfigData)
  }

  function setConfigData(data) {
      dataConfig = data;
  }

  function setConfigHTML(data) {
    document.getElementsByClassName("module-donate__title")[0].innerText = data.innerText.companyTitle;
    document.getElementsByClassName("module-donate__description")[0].innerHTML = data.innerText.companyDescription;
    document.getElementsByClassName("payment__description")[0].innerText = data.innerText.paymentDescriptionTitle;
    document.getElementsByClassName("result__description")[0].insertAdjacentHTML( 'beforeend', data.innerText.resultsText);

    document.getElementById('module-donate').style.backgroundColor = data.backgroundColor;

    document.getElementsByClassName("module-donate__title")[0].style.color = data.titleTextColor;
    document.getElementsByClassName("module-donate__title")[0].style.fontSize = data.titleFontSize;

    document.getElementsByClassName("module-donate__description")[0].style.color = data.descriptionTextColor;
    document.getElementsByClassName("module-donate__description")[0].style.fontSize = data.descriptionFontSize;


    updateIframeHeight();
  }

  function getBePaidJS(data) {

    var options = {
      type: 'inline',
      id: 'donate-bePaid__form',
      url: data.checkout.redirect_url,
      style: window.paymentStyle,
      size: { width: "100%", height: "100%" }
    };

    var pf = new BeGateway(options);
    pf.buildForm();
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

  function back() {
     window.parent.postMessage(['doikaMain', true], '*')
  }

  function init() {

    switch (window.parent.doika.status) {
      case 'success':
        var bePaidForm = document.querySelector(".donate-bePaid__form");
        var wrapper = document.querySelector(".module-donate__message");
        bePaidForm.style.display = "none";
        wrapper.style.display = "flex";
        var title = document.querySelector(".module-donate__message_title");
        title.innerHTML = "Дзякуй, аплата паспяхова завершана";
        title.style.background = "url(assets/img/success.png) center center no-repeat";
        title.style.backgroundSize = "contain";
        var button = document.querySelector(".module-donate__message_button");
        var backbutton = document.querySelector(".module-donate__back-button");
        backbutton = backbutton.style.display = "none";
        document.querySelector(".module-donate__message_button").addEventListener("click", back);
        button.innerHTML = "Паспрабаваць яшчэ раз";
      break;
      case 'decline':
        var bePaidForm = document.querySelector(".donate-bePaid__form");
        var wrapper = document.querySelector(".module-donate__message");
        bePaidForm.style.display = "none";
        wrapper.style.display = "flex";
        var title = document.querySelector(".module-donate__message_title");
        title.style.background = "url(assets/img/decline.png) center center no-repeat";
        title.style.backgroundSize = "contain";
        title.innerHTML = "Прабачце,транзакцыя была адхiлена банкам";
        var button = document.querySelector(".module-donate__message_button");
        button.innerHTML = "Паспрабаваць яшчэ раз";
        var backbutton = document.querySelector(".module-donate__back-button");
        backbutton = backbutton.style.display = "none";
        document.querySelector(".module-donate__message_button").addEventListener("click", back);
      break;
      case 'fail':
        var bePaidForm = document.querySelector(".donate-bePaid__form");
        var wrapper = document.querySelector(".module-donate__message");
        bePaidForm.style.display = "none";
        wrapper.style.display = "flex";
        var title = document.querySelector(".module-donate__message_title");
        title.innerHTML = "Прабачце,транзакцыя была адхiлена з прычыны тэхнiчнага збою";
        title.style.background = "url(assets/img/fail.png) center center no-repeat";
        title.style.backgroundSize = "contain";
        var button = document.querySelector(".module-donate__message_button");
        button.innerHTML = "Паспрабаваць яшчэ раз";
        var backbutton = document.querySelector(".module-donate__back-button");
        document.querySelector(".module-donate__message_button").addEventListener("click", back);
        backbutton = backbutton.style.display = "none";
      break;
      default:
        var url = `/doika/donate-${window.parent.doika.companyId}?donate=` + window.parent.doikaSum;
        AJAXRequest(url, getBePaidJS);
   }

    document.querySelector(".payment__description").addEventListener("click", PopUpShow);
    document.querySelector(".module-donate__back-button").addEventListener("click", back);

    loadDataConfig();
    loadConfig();
    document.querySelector("#donate-bePaid__form").addEventListener("load", updateIframeHeight);

  }

  window.addEventListener("load", init);

  function PopUpShow() {
    window.parent.postMessage(['openPopUp', true], '*')
  }

  function updateIframeHeight() {
    window.parent.postMessage(['updateIframeHeight', true], '*')
  }

}());
