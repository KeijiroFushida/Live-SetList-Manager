@extends('layouts.app')

@section('content')

<h2>イベント詳細</h2>

<div class="container">
    <div class="row">
        <h3 class="visible-lg-inline-block visible-md-inline-block visible-sm-inline-block visible-xs-block">{{ $event->event_name }} @ {{ $event->event_place }}</h3>
        <p class="visible-lg-inline-block visible-md-inline-block visible-sm-inline-block visible-xs-block">{{ $event->event_date }}</p>
    </div>
    
    <h4>SetList</h4>
    <table class="table">
        <thead>
            <tr>
                <th>曲順</th>
                <th>曲名</th>
                <th>アーティスト名</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event->music as $music)
                <tr>
                    <td>{{ $music->order }}</td>
                    <td>{{ $music->music_name }}</td>
                    <td>{{ $music->artist->artist_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection