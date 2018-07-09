<!DOCTYPE html>
<html lang="be">
<head>
  <title>Стварэнне кампаніі</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Scada">
  <link rel="stylesheet" href="css/toggler.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="index.js"></script>
  <script src="js/campaignPage.js"></script>
</head>
<body>
  <header class="doika__header">
    <div class="doika__header__wrapper">
      <div class="logo"></div>
        <button class="button-quit" onclick="document.location.replace('/')">Перайсці на сайт</button>
        <button class="button-quit" onclick="document.location.replace('/doika/get-out')">Выхад</button>
    </div>
    <div class="doika__header__menu">
      <button class="menu__menu-item" onclick="document.location.replace('/doika/show-list')">Галоўная</button>
      <button class="menu__menu-item" onclick="document.location.replace('/doika/show-configurations')">Канфiгурацыя модуля</button>
      <button class="menu__menu-item">Як карыстацца модулем</button>
    </div>
  </header>

  <main>
    <div class="breadcrumbs">Адмін > Галоўная старонка > Стварэнне кампаніі</div>
    <form class="form" name="createCampaign" action="/doika/create" enctype="multipart/form-data" method="post">
      <div class="form__doCampaignActive">
        <div>
          <input type="checkbox" name="campaign_active" id="doCampaignActive">
          <label for="doCampaignActive" class="input-title doCampaignActive">Зрабіць кампанію актыўнай</label>
        </div>
      </div>
      @if (count($errors) > 0)
        <div>
          <ul>
            @foreach ($errors->all() as $error)
              <li style="color:red">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="campaign-name">
        <label for="nameOfCampaign" class="input-title">Назва кампаніі</label>
        <input class="campaign-name__input" placeholder="Aб’ём тэксту павiнен быць не больш за 112 сiмвалау з прабелами" type="text" name="title" id="nameOfCampaign" value="{{ old('title') }}">
      </div>
      <div class="form__info row">
        <div class="requested-sum">
          <label for="sum" class="input-title">Патрэбная сума, BYN</label>
          <input class="requested-sum__input" type="text" name="required_amount" placeholder="неабходна сабраць" id="sum" value="{{ old('required_amount') }}">
        </div>
        <div class="shortcode">
          <label for="shortcode" class="input-title">Шорткод</label>
          <input class="shortcode__input" type="text" name="shortcode" id="shortcode" readonly value="У распрацоўцы">
        </div>
      </div>
      <div class="form__dates row">
        <div class="date">
          <label for="dateOfStart" class="input-title">Дата пачатку</label>
          <input class="date__input" type="text" placeholder="дата актывацыі" name="time_start" id="dateOfStart" value="{{ old('time_start') }}">
        </div>
        <div class="date">
          <label for="dateOfFinish" class="input-title">Дата заканчэння</label>
          <input class="date__input" type="text" placeholder="дата заканчэння" name="time_end" id="dateOfFinish" value="{{ old('time_end') }}">
        </div>
      </div>
      <div class="form__desc">
        <div class="desc-of-campaign">
          <label for="descriptionOfCampaign" class="input-title title-info title-star"><span>Апісанне кампаніі</span></label>
          <textarea class="desc-of-campaign__input" name="description" id="descriptionOfCampaign" cols="30" rows="10" maxlength="418">{{ old('description') }}</textarea>
          <p class="remark">* Аб’ём тэкста з малюнкам - 418 сiмвалау з прабелам</p>
          <p class="remark">* Аб’ём тэкста без малюнка - 488 сiмвалау з прабелам</p>
        </div>
        <div class="add-picture">
          <label for="photo" class="input-title photo-select">Змяніць малюнак</label>
          <input type="file" name="photo" id="photo" class="photo-input">
          <div class="selected-picture"><img id="image" src=""></div>
        </div>
      </div>
      <div class="form__other row">
        <div class="toggler">
          <label class="switch">
            <input class="progress_bar_checkbox" type="checkbox" name="campaign_progress_bar">
            <span class="slider round"></span>
          </label>
          <span class="toggler__label input-title">Выключыць прагрэс-бар</span>
        </div>
        <button id="test" class="main-buttons__create-campaign add-language-button" class="input-title">Дадаць мову</button>
      </div>
      <button class="submit-button main-buttons__create-campaign">Захаваць</button>
    </form>
  </main>

  <div class="popup-background">
    <form class="popup-content" action="">
      <div class="popup-close"></div>
      <div class="popup-content__left">
        <div class="lang-name">
          <label for="codeOfLanguage">Мова (код мовы)</label>
          <input type="text" name="codeOfLanguage" id="codeOfLanguage">
        </div>
        <div class="lang-desc">
          <label for="descOfLanguage">Апісанне</label>
          <textarea name="descOfLanguage" id="descOfLanguage" cols="30" rows="10"></textarea>
        </div>
        <button class="add-lang__close main-buttons__create-campaign">Захаваць</button>
      </div>
      <div class="lang-list">
        <div class="lang-list__title">Спіс моў</div>
        <ul class="lang-list__list">
          <li>беларуская</li>
        </ul>
        <button>Дадаць мову</button>
      </div>
    </form>
  </div>

</body>
</html>
