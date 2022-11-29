@extends('base')

@section('title')
Клиенты
@endsection

<h3><a href="create">Добавить клиента</a></h3>

@section('content')
<table>
	<tr>
		<th>ФИО</th>
		<th>Автомобиль</th>
		<th>Государственный номер</th>
		<th>&#9998;</th>
		<th style="color: red;">&#10006;</th>
	</tr>
	@foreach($clients as $el)
	<tr>
		<td>{{ $el->name }}</td>
		<td>{{ $el->brand }}</td>
		<td>{{ $el->number }}</td>
	</tr>
	@endforeach
</table>
@endsection