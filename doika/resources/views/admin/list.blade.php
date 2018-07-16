<!DOCTYPE html>
<html lang="be">
<head>
  <title>Спіс кампаній</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Scada">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto">
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
        <button class="menu__menu-item active" onclick="document.location.replace('/doika/show-list')">Галоўная</button>
        <button class="menu__menu-item" onclick="document.location.replace('/doika/show-configurations')">Канфiгурацыя модуля</button>
      </div>
    </header>

	<main>

		<div class="main-buttons">
			<button onclick="window.open('/doika/create')" class="main-buttons__create-campaign">Стварыць кампанію</button>
		</div>

		<!--<div class="breadcrumbs">Адмін > Галоўная старонка > Спіс кампаній</div>-->

		<div class="list-title">
			<h1>Спіс кампаній</h1>
			
                        @if(!isset($conditions_id))
			      <select name="list-filter" onchange="window.location.href=this.options[this.selectedIndex].value">
                                <option value="/doika">Усе</option>
                                <option value="/doika/show-list-1">Актыўныя</option>
                                <option value="/doika/show-list-2">Адкладзеныя</option>
                                <option value="/doika/show-list-3">Завершаныя</option>

                              </select>
                        @elseif($conditions_id == 1)
			      <select name="list-filter" onchange="window.location.href=this.options[this.selectedIndex].value">
                                
                                <option value="/doika/show-list-1">Актыўныя</option>
                                <option value="/doika/show-list-2">Адкладзеныя</option>
                                <option value="/doika/show-list-3">Завершаныя</option>
                                <option value="/doika">Усе</option>

                              </select>
                        @elseif($conditions_id == 2)
			      <select name="list-filter" onchange="window.location.href=this.options[this.selectedIndex].value">
                                <option value="/doika/show-list-2">Адкладзеныя</option>
                                <option value="/doika/show-list-1">Актыўныя</option>
                                <option value="/doika/show-list-3">Завершаныя</option>
                                <option value="/doika">Усе</option>

                              </select>
                        @elseif($conditions_id == 3)
			      <select name="list-filter" onchange="window.location.href=this.options[this.selectedIndex].value">
                                <option value="/doika/show-list-3">Завершаныя</option>
                                <option value="/doika/show-list-2">Адкладзеныя</option>
                                <option value="/doika/show-list-1">Актыўныя</option>
                                <option value="/doika">Усе</option>

                              </select>
                        @endif
		</div>

		<table>
			<thead>
				<tr>
					<th>Назва кампаніі</th>
					<th>Статус</th>
					<th>Сабраная сума</th>
					<th>Мэтавая сума</th>
					<th>Колькасць бэкераў (ахвярадаўцаў)</th>
					<th>Сярэдні чэк па кампаніі (акцыі)</th>
					<th>Дата пачатку</th>
					<th>Дата сканчэння</th>
					<th>Колькасць дзён да канца</th>
				</tr>
			</thead>
			<tbody>
    @if(isset($campaigns))
      @foreach($campaigns as $campaign)
				<tr>
					<td><a href="/doika/show-campaign-{{ $campaign['id'] }}">{{ $campaign['title'] }}</a></td>
					<td>{{ $campaign['active'] }}</td>
					<td>{{ $campaign['collected_amount']}}</td>
					<td>{{ $campaign['required_amount'] }}</td>
					<td>{{ $campaign['count_payments'] }}</td>
					<td>{{ $campaign['avg_payment'] }}</td>
					<td>{{ $campaign['time_start'] }}</td>
					<td>{{ $campaign['time_end'] }}</td>
					<td>{{ $campaign['time_to_end'] }}</td>
				</tr>
      @endforeach
		@endif
			</tbody>
		</table>

	</main>

	@if(!isset($first_login))
		<div class="login-popup">
			<div class="login-popup-content">
				<form action="/doika/save-login" method="post" class="form">
					<h2>Абавязкова ўвядзіце бяспечны пароль і імя адміна</h2>
					
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
					<button class="submit-button main-buttons__create-campaign">Захаваць</button>
				</form>
			</div>
		</div>
	@endif

</body>
</html>
