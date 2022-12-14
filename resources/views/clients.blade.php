@extends('base')

@section('title')
Клиенты
@endsection

<h3><a href="create">Добавить клиента</a></h3>

@section('content')
<table>
	<tr>
		<th></th>
		<th>ФИО</th>
		<th>Автомобиль</th>
		<th>Государственный номер</th>
		<th>&#9998;</th>
		<th>&#10006;</th>
	</tr>
	@foreach($clients as $el)
	<tr>
		<td>{{ $loop->index + 1 }}</td>
		<td>{{ $el->name }}</td>
		<td>{{ $el->brand }}</td>
		<td>{{ $el->number }}</td>
		<td><a href="update?id={{ $el->client_id }}">Редактировать</a></td>
		<td><a href="deleted?number={{ $el->number }}" style="color: red;">Удалить</a></td>
	</tr>
	@endforeach
</table>
@endsection