<!DOCTYPE html>
<html lang="be">
<head>
  <title>Канфігурацыя кампаніі</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Scada">
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
      </div>

    </header>

	<main>

    <div class="breadcrumbs">Адмін > Галоўная старонка > Канфігурацыя модуля</div>

		<form action="/doika/save-configurations" method="post" class="form">

			<h2>Асабістыя дадзеныя</h2>
			<div class="row">
				<div class="input">
					<label for="conf-login" class="conf-title">E-mail</label>
					<input type="text" placeholder="Login" id="conf-login" name="login" class="input__input" value="{{ Auth::user()->email }}">
				</div>
				
			</div>
			<div class="row">
				<div class="input">
					<label for="conf-password" class="conf-title">Новы пароль</label>
					<input type="password" id="conf-password" name="password" class="input__input" value="{{ isset($password) ? $password : '' }}">
				</div>
				<div class="input">
					<label for="conf-password-confirm" class="conf-title">Пацвержанне новага паролю</label>
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
					<label for="conf-color" class="conf-title checkbox-title">Падключыць тэставыя плацежы</label>
					<input class="checkbox-test-payments" type="checkbox" name="test_payments" {{isset($test_payments) ? 'checked' : ''}}>
				</div>
			</div>

			
			<h2>Наладкі выгляду</h2>

			<div class="row">
				<div class="input">
					<label for="conf-color" class="conf-title checkbox-title">Паказваць банэр?</label>
					<input class="checkbox-test-payments" type="checkbox" name="show_banner" {{isset($show_banner) ? 'checked' : ''}}>
				</div>

				<div class="input">
					<label for="color_banner_background" class="conf-title">Колер фону банэра</label>
					<input type="text" placeholder="TextField" id="color_banner_background" name="color_banner_background" class="input__input" value="{{ isset($color_banner_background) ? $color_banner_background : '' }}">
				</div>
			</div>
			<div class="row">
				<div class="input">
					<label for="color_banner_help_background" class="conf-title">Колер кнопкі "Дапамагчы"</label>
					<input type="text" placeholder="TextField" id="color_banner_help_background" name="color_banner_help_background" class="input__input" value="{{ isset($color_banner_help_background) ? $color_banner_help_background : '' }}">
				</div>
				<div class="input">
					<label for="color_banner_help_text" class="conf-title">Колер тэкста "Дапамагчы"</label>
					<input type="text" placeholder="TextField" id="color_banner_help_text" name="color_banner_help_text" class="input__input" value="{{ isset($color_banner_help_text) ? $color_banner_help_text : '' }}">
				</div>
			</div>
			<div class="row">
				<div class="input">
					<label for="color_module_background" class="conf-title">Колер фона модуля</label>
					<input type="text" placeholder="TextField" id="color_module_background" name="color_module_background" class="input__input" value="{{ isset($color_module_background) ? $color_module_background : '' }}">
				</div>
				<div class="input">
					<label for="color_module_buttons" class="conf-title">Колер кнопак з сумамі</label>
					<input type="text" placeholder="TextField" id="color_module_buttons" name="color_module_buttons" class="input__input" value="{{ isset($color_module_buttons) ? $color_module_buttons : '' }}">
				</div>
			</div>

			<button class="submit-button main-buttons__create-campaign">Захаваць</button>
		</form>
</body>
</html>
