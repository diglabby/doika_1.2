<!DOCTYPE html>
<html lang="be">
<head>
	<title>Спіс кампаній</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Scada">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">

	<link rel="stylesheet" href="css/toggler.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

    <header class="doika__header">
      <div class="doika__header__wrapper">
        <div class="logo"></div>
        <button class="button-quit" onclick="document.location.replace('/')">Перейти на сайт</button>
        <button class="button-quit" onclick="document.location.replace('/doika/show-list')">Выход</button>
      </div>
      <div class="doika__header__menu">
        <button class="menu__menu-item active" onclick="document.location.replace('/doika/show-list')">Галоўная</button>
        <button class="menu__menu-item" onclick="document.location.replace('/doika/show-configurations')">Канфiгурацыя модуля</button>
        <button class="menu__menu-item">Як карыстацца модулем</button>
      </div>
    </header>

	<main>

		<div class="main-buttons">
			<button onclick="window.open('/doika/create')" class="main-buttons__create-campaign">Стварыць кампанію</button>
			<button onclick="document.location.replace('/doika/show-list')" class="main-buttons__donate">Дапамажы нам стаць лепей</button>
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
    @if(isset($companies))
      @foreach($companies as $company)
				<tr>
					<td><a href="/doika/show-company-{{ $company['id'] }}">{{ $company['title'] }}</a></td>
					<td>{{ $company['active'] }}</td>
					<td>{{ $company['collected_amount']}}</td>
					<td>{{ $company['required_amount'] }}</td>
					<td>{{ $company['count_payments'] }}</td>
					<td>{{ $company['avg_payment'] }}</td>
					<td>{{ $company['time_start'] }}</td>
					<td>{{ $company['time_end'] }}</td>
					<td>{{ $company['time_to_end'] }}</td>
				</tr>
      @endforeach
		@endif
			</tbody>
		</table>

	</main>
</body>
</html>
