<!DOCTYPE html>
<html lang="be">
<head>
	<title>Стварэнне кампаніі</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Scada">
	
	<link rel="stylesheet" href="css/toggler.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="index.js"></script>
</head>
<body>
	<main>

		<div class="menu-buttons">
			<button onclick="document.location.replace('/doika/show-configurations')" class="menu-buttons__configuration-button">Канфігурацыя модуля</button>
			<button onclick="document.location.replace('/doika/show-list')" class="menu-buttons__list-button">Спіс кампаній</button>
		</div>

		<div class="breadcrumbs">Адмін > Галоўная старонка > Стварэнне кампаніі</div>

		<form class="form" name="createCompany" action="/doika/create" enctype="multipart/form-data" method="post">
			<div class="form__doCompanyActive">
				<div>
					<input type="checkbox" name="company_active" id="doCompanyActive">
					<label for="doCompanyActive">Зрабіць кампанію актыўнай</label>
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
			<div class="form__info">
				<div class="company-name">
					<label for="nameOfCompany">Назва кампаніі</label>
					<input class="company-name__input" type="text" name="title" id="nameOfCompany" value="{{ old('title') }}">
				</div>
				<div class="requested-sum">
					<label for="sum">Патрэбная сума, BYN</label>
					<input class="requested-sum__input" type="text" name="required_amount" id="sum" value="{{ old('required_amount') }}">
				</div>
			</div>
			<div class="form__dates">
				<div class="date">
					<label for="dateOfStart">Дата пачатку</label>
					<input class="date__input" type="date" name="time_start" id="dateOfStart" value="{{ old('time_start') }}">
				</div>
				<div class="date">
					<label for="dateOfFinish">Дата заканчэння</label>
					<input class="date__input" type="date" name="time_end" id="dateOfFinish" value="{{ old('time_end') }}">
				</div>
			</div>
			<div class="form__desc">
				<div class="desc-of-company">
					<label for="descriptionOfCompany">Апісанне кампаніі</label>
					<textarea class="desc-of-company__input" name="description" id="descriptionOfCompany" cols="30" rows="10">{{ old('description') }}</textarea>
				</div>
				<div class="add-picture">
          <input  type="file" name="photo">
          
          
				</div>
			</div>
			<div class="form__other">
				<div class="toggler">
					<label class="switch">
						<input type="checkbox">
						<span class="slider round"></span>
					</label>
					<span class="toggler__label">Выключыць прагрэс-бар</span>
				</div>
				<button id="test">Дадаць мову</button>
			</div>
			<input class="submit-button" type="submit" value="Захаваць">
		</form>

	</main>
		<div class="popup-background">
			<form class="popup-content" action="">
				<div class="popup-content__left">
					<div class="lang-name">
						<label for="codeOfLanguage">Мова (код мовы)</label>
						<input type="text" name="codeOfLanguage" id="codeOfLanguage">
					</div>
					<div class="lang-desc">
						<label for="descOfLanguage">Апісанне</label>
						<textarea name="descOfLanguage" id="descOfLanguage" cols="30" rows="10"></textarea>
					</div>
					<button class="add-lang__close">Захаваць</button>
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