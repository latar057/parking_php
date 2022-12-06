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
	<input required type="text" name="name">
	<p>Пол</p>
	<select required name="gender">
		<option value="м">м</option>
		<option value="ж">ж</option>
	</select>
	<p>Телефон</p>
	<input required type="number" name="number">
	<p>Адрес</p>
	<input required type="text" name="adress">
	<p>Количество машин</p>
	<input required type="number" name="car">
	<input type="submit" value="Добавить">
</form>
<form action="create/car" method="POST">
	@csrf
	<h2>Добавить автомобиль</h2>

	<p>Марка автомобиля</p>
	<input required type="text" name="brand">
	<p>Модель автомобиля</p>
	<input required type="text" name="model">
	<p>Цвет кузова</p>
	<input required type="text" name="color">
	<p>Номер машины</p>
	<input required type="text" name="number">
	<p>Статус</p>
	<select required name="flag">
		<option value="находится">находится</option>
		<option value="отсутсвует">отсутсвует</option>
	</select>
	<input type="submit" value="Добавить"></input>
</form>
@endsection