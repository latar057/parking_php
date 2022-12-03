@extends('base')

@section('title')
Добавить клиента
@endsection

@section('content')
<h4><a href="clients">назад</a></h4>
<form action="create/client" method="POST">
	@csrf
	<h2>Добавить клиента</h2>
	<p>ФИО</p>
	<input type="text" name="name">
	<p>Пол</p>
	<select name="gender">
		<option value="м">м</option>
		<option value="ж">ж</option>
	</select>
	<p>Телефон</p>
	<input type="number" name="number">
	<p>Адрес</p>
	<input type="text" name="adress">
	<p>Количество машин</p>
	<input type="number" name="car">
	<input type="submit" value="Добавить">
</form>
<form action="create/car" method="POST">
	@csrf
	<h2>Добавить автомобиль</h2>

	<p>Марка автомобиля</p>
	<input type="text" name="brand">
	<p>Модель автомобиля</p>
	<input type="text" name="model">
	<p>Цвет кузова</p>
	<input type="text" name="color">
	<p>Номер машины</p>
	<input type="text" name="number">
	<p>Статус</p>
	<select name="flag">
		<option value="1">находится</option>
		<option value="0">отсутсвует</option>
	</select>

	<input type="submit" value="Добавить"></input>
</form>
@endsection