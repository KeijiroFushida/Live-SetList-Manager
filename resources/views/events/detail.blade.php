@extends('layouts.app')

@section('content')

<h2>イベント詳細</h2>

<div class="container">
    <div class="row">
        <h3 class="visible-lg-inline-block visible-md-inline-block visible-sm-inline-block visible-xs-block">{{ $event->event_name }} @ {{ $event->event_place }}</h3>
        <p class="visible-lg-inline-block visible-md-inline-block visible-sm-inline-block visible-xs-block">{{ $event->event_date }}</p>
    </div>
    
    <div>
        <h4>SetList</h4>
        <button type="button" class="btn btn-primary btn-edit-artist col-sm-2" data-toggle="modal" data-target="#music-modal">追加</button>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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

<!-- モーダル・ダイアログ -->
<div class="modal fade" id="music-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                <h4 class="modal-title">アーティスト登録</h4>
            </div>
            <form method="post" action="/music/save/">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="sr-only control-label" for="music-name">曲名</label>
                        <input type="text" name="music_name" class="form-control" id="music-name" placeholder="曲名を入力">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-primary" id="regist-music">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
