@extends('base')

@section('title')
Редактирование
@endsection

@section('content')
@foreach($update_table as $el)
<h4><a href="clients">назад</a></h4>
<form action="update/client" method="POST">
	@csrf
	<h2>Редактировать данные клиента</h2>
	<input type="hidden" name="client_id" value="{{ $el->client_id }}">
	<p>ФИО</p>
	<input required type="text" name="name" value="{{ $el->name }}">
	<p>Пол</p>
	<select required name="gender">
		<option value="м" @if($el->gender == 'м') selected @endif>м</option>
		<option value="ж" @if($el->gender == 'ж') selected @endif>ж</option>
	</select>
	<p>Телефон</p>
	<input required type="number" name="number" value="{{ $el->phone }}">
	<p>Адрес</p>
	<input type="text" name="adress" value="{{ $el->adress }}">
	<p>Количество машин</p>
	<input required type="number" name="car" value="{{ $el->car }}">
	<input type="submit" value="Редактировать">
</form>
<form action="update/car" method="POST">
	@csrf
	<h2>Редактировать данные автомобиля</h2>
	<input type="hidden" name="client_id" value="{{ $el->client_id }}">
	<p>Марка автомобиля</p>
	<input required type="text" name="brand" value="{{ $el->brand }}">
	<p>Модель автомобиля</p>
	<input required type="text" name="model" value="{{ $el->model }}">
	<p>Цвет кузова</p>
	<input required type="text" name="color" value="{{ $el->color }}">
	<p>Номер машины</p>
	<input required type="text" name="number" value="{{ $el->number }}">
	<p>Статус</p>
	<select required name="flag">
		<option value="находится" @if($el->flag == 1) selected @endif>находится</option>
		<option value="отсутствует" @if($el->flag == 0) selected @endif>отсутсвует</option>
	</select>

	<input type="submit" value="Редактировать"></input>
</form>
@endforeach
@endsection