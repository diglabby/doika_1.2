<!DOCTYPE html>
<html lang="be">
<head>
	<title>Спіс кампаній</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Scada">
	
	<link rel="stylesheet" href="css/toggler.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="index.js"></script>
</head>
<body style="padding:0; margin-right:12%; margin-left:12%">
	<main>

		<div class="menu-buttons">
			<button onclick="document.location.replace('/doika/show-configurations')" class="menu-buttons__configuration-button">Канфігурацыя модуля</button>
			<button onclick="document.location.replace('/doika/show-list')" class="menu-buttons__list-button">Спіс кампаній</button>
		</div>

		<div class="breadcrumbs">Адмін > Галоўная старонка > Спіс кампаній</div>
		
		<button onclick="window.open('/doika/create')">Стварыць кампанію</button>

		<div class="list-title">
			<h1>Спіс кампаній</h1>
			<select name="list-filter">
				<option value="v1">Актыўныя</option>
				<option value="v2">Адкладзеныя</option>
				<option value="v3">Завершаныя</option>
				<option value="v4">Усе</option>
			</select>
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
    @if(isset($companies))  
      @foreach($companies as $company)
				<tr>
					<td><a href="/doika/show-company-{{ $company['id'] }}">{{ $company['title'] }}</a></td>
					<td>{{ $company['active'] }}</td>
					<td>н.д.</td>
					<td>{{ $company['required_amount'] }}</td>
					<td>н.д.</td>
					<td>н.д.</td>
					<td>{{ $company['time_start'] }}</td>
					<td>{{ $company['time_end'] }}</td>
					<td>н.д.</td>
				</tr>
      @endforeach
		@endif		
			</tbody>
		</table>
    
	</main>
</body>
</html>