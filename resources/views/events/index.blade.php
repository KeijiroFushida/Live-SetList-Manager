@extends('layouts.app')

@section('content')

<h1>イベント一覧</h1>

<div class="container">
	<form id="ListArea" action="/home" method="put" >
		<div class="retrievalArea">
			<input type="text" name="eventName" placeholder="イベント名"><br>
			<input type="text" name="artistName" placeholder="アーティスト名"><br>
			<input type="text" name="eventPlace" placeholder="ライブ会場"><br>
			<input type="text" name="eventDate" placeholder="日時"><br>
			<input type="submit" value="検索">
		</div>
		@foreach ($event_data as $data) 
		<div class="eventDataArea">
			<a href="">
				<div class="eventTitle">{{$data->event_name}}</div>
				<div class="eventPlace">{{$data->event_place}}</div>
				<div class="eventDate">{{$data->event_date}}</div>
				<div class="artistName"<{{$data->artist_name}}</div>
			</a>
		</div>
		@endforeach
	</form>
</div>
@endsection
