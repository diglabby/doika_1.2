<!DOCTYPE html>
<html lang="be">
<head>
	<title>Канфігурацыя кампаніі</title>

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

		<div class="breadcrumbs">Адмін > Галоўная старонка > Канфігурацыя модуля</div>

		<form action="/doika/save-configurations" method="post" class="form">
			<div class="row">
				<div class="input">
					<label for="conf-token">Token</label>
					<input type="text" placeholder="TextField" id="conf-token" name="token" class="input__input" value="{{ isset($token) ? $token : '' }}">
				</div>
				<div class="input">
					<label for="conf-idmarket">Idmarket</label>
					<input type="text" placeholder="TextField" id="conf-idmarket" name="id_market" class="input__input" value="{{ isset($id_market) ? $id_market : '' }}">
				</div>
			</div>
			<div class="row">
				<div class="input">
					<label for="conf-color">Колер</label>
					<input type="text" placeholder="TextField" id="conf-color" name="color" class="input__input" value="{{ isset($color) ? $color : '' }}">
				</div>
				<div class="input">
					<label for="conf-keymarket">KeyMarket</label>
					<input type="text" placeholder="TextField" id="conf-keymarket" name="key_market" class="input__input" value="{{ isset($key_market) ? $key_market : '' }}">
				</div>
			</div>
			<button class="submit-button">Захаваць</button>
		</form>
</body>
</html>