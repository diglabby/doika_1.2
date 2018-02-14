<!DOCTYPE html>
<html lang="be">
<head>
	<title>Асобная кампанія</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Scada">
	
	<link rel="stylesheet" href="css/toggler.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="index.js"></script>
</head>
<body  style="padding:0; margin-right:22%; margin-left:22%">
	<main>

		<div class="menu-buttons">
			<button onclick="document.location.replace('/doika/show-configurations')" class="menu-buttons__configuration-button">Канфігурацыя модуля</button>
			<button onclick="document.location.replace('/doika/show-list')" class="menu-buttons__list-button">Спіс кампаній</button>
		</div>

		<div class="breadcrumbs">Адмін > Галоўная старонка > Асобная кампанія</div>

		<form class="form" name="updateCompany" action="/doika/update-company-{{ $id }}" method="post" enctype="multipart/form-data">
			<div class="form__doCompanyActive">
				<div>
					<input type="checkbox" name="company_active" id="doCompanyActive" {{ isset($check) ? $check : '' }}>
					<label for="doCompanyActive">Зрабіць кампанію актыўнай</label>
				</div>
				<button class="button-delete"><a href="/doika/delete-company-{{ $id }}">Выдаліць кампанію</a></button>
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
					<input class="company-name__input" type="text" name="title" id="nameOfCompany" value="{{ $name }}">
				</div>
				<div class="requested-sum">
					<label for="sum">Патрэбная сума, BYN</label>
					<input class="requested-sum__input" type="text" name="required_amount" id="sum" value="{{ $required_amount }}">
				</div>
			</div>
      
			<div class="label-company">
				Назва кампаніі: <span>doika-24-by</span>
			</div>
			<div class="form__dates">
				<div class="date">
					<label for="dateOfStart">Дата пачатку</label>
					<input class="date__input" type="date" name="time_start" id="dateOfStart" value="{{ $time_start }}">
				</div>
				<div class="date">
					<label for="dateOfFinish">Дата заканчэння</label>
					<input class="date__input" type="date" name="time_end" id="dateOfFinish" value="{{ $time_end }}">
				</div>
			</div>
			<div class="status">
				<div>Колькасць дзён у актыўным стане: <span>33</span> з <span>100</span></div>
				<meter value=33 max=100></meter>
			</div>
			<div class="form__desc">
				<div class="desc-of-company">
					<label for="descriptionOfCompany">Апісанне кампаніі</label>
					<textarea class="desc-of-company__input" name="description" id="descriptionOfCompany" cols="30" rows="10">{{ $description }}</textarea>
				</div>
				<div class="add-picture">
          <img alt="a" src="{{ 'public/images/'.$photo }}" width="40px">
          <input  type="file" name="photo" >
          
          
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