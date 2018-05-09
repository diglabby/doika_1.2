<!DOCTYPE html>
<html lang="be">
<head>
	<title>Канфігурацыя кампаніі</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Scada">

	<link rel="stylesheet" href="css/toggler.css">
	<link rel="stylesheet" href="css/style.css">	
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
        <button class="menu__menu-item active" onclick="document.location.replace('/doika/show-configurations')">Канфiгурацыя модуля</button>
        <button class="menu__menu-item">Як карыстацца модулем</button>
      </div>

    </header>

	<main>

    <div class="breadcrumbs">Адмін > Галоўная старонка > Канфігурацыя модуля</div>

		<form action="/doika/save-configurations" method="post" class="form">

			<h2>Бяспека</h2>
			<div class="row">
				<div class="input">
					<label for="conf-login" class="conf-title">Лагін</label>
					<input type="text" placeholder="Login" id="conf-login" name="login" class="input__input" value="{{ isset($login) ? $login : '' }}">
				</div>
				
			</div>
			<div class="row">
				<div class="input">
					<label for="conf-password" class="conf-title">Пароль</label>
					<input type="password" id="conf-password" name="password" class="input__input" value="{{ isset($password) ? $password : '' }}">
				</div>
				<div class="input">
					<label for="conf-password-confirm" class="conf-title">Падцвержанне паролю</label>
					<input type="password" id="conf-password-confirm" name="conf-password-confirm" class="input__input" value="{{ isset($password_confirm) ? $password_confirm : '' }}">
				</div>				
			</div>
			

			<h2>Злучэнне з плацежнай сістэмай</h2>
			<div class="row">
				<div class="input">
					<label for="conf-token" class="conf-title">Token</label>
					<input type="text" placeholder="TextField" id="conf-token" name="token" class="input__input" value="{{ isset($token) ? $token : '' }}">
				</div>
				<div class="input">
					<label for="conf-idmarket" class="conf-title">Idmarket</label>
					<input type="text" placeholder="TextField" id="conf-idmarket" name="id_market" class="input__input" value="{{ isset($id_market) ? $id_market : '' }}">
				</div>
			</div>

			<div class="row">
				
				<div class="input">
					<label for="conf-keymarket" class="conf-title">KeyMarket</label>
					<input type="text" placeholder="TextField" id="conf-keymarket" name="key_market" class="input__input" value="{{ isset($key_market) ? $key_market : '' }}">
				</div>

				<div class="input">
					<label for="conf-color" class="conf-title checkbox-title">Адключыць тэставыя плацежы</label>
					<input class="checkbox-test-payments" type="checkbox" name="test_payments" "{{ isset($test_payments) ? 'checked' : '' }}">
				</div>
			</div>

			
			<h2>Наладкі выгляду</h2>
			
			<div class="row">
				<div class="input">
					<label for="conf-color" class="conf-title">Колер агульнага фону</label>
					<input type="text" placeholder="TextField" id="conf-color" name="color" class="input__input" value="{{ isset($color) ? $color : '' }}">
				</div>
				<div class="input">
					<label for="conf-color-summ-button" class="conf-title">Колер кнопак з сумамі</label>
					<input type="text" placeholder="TextField" id="conf-color-summ-button" name="conf-color-summ-button" class="input__input" value="{{ isset($color) ? $color : '' }}">
				</div>
			</div>

		      <div class="row">
						<div class="input">
							<label for="conf-color-banner" class="conf-title">Колер фону верхняга банера</label>
							<input type="text" placeholder="TextField" id="conf-color-banner" name="color-banner" class="input__input" value="{{ isset($color) ? $color : '' }}">
						</div>
		        <div class="input">
							<label for="conf-color-banner-button" class="conf-title">Колер кнопкі "Дапамагчы"</label>
							<input type="text" placeholder="TextField" id="conf-color-banner-button" name="conf-color-banner-button" class="input__input" value="{{ isset($color) ? $color : '' }}">
						</div>
					</div>



			<button class="submit-button main-buttons__create-campaign">Захаваць</button>
		</form>
</body>
</html>
