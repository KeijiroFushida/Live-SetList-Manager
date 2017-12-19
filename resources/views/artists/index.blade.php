@extends('layouts.app')

@section('content')

<h3>アーティスト一覧</h3>
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="list-group">
        @foreach ($artists as $artist)
            <div class="list-group-item container-fluid">
                <div class="col-sm-10"><a href="#">{{ $artist->artist_name }}</a></div>
                <button type="button" class="btn btn-primary btn-edit-artist col-sm-2" data-toggle="modal" data-target="#artist-modal" data-id="{{ $artist->id }}" data-name="{{ $artist->artist_name }}">編集</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#artist-modal">新規登録</button>
</div>

<!-- モーダル・ダイアログ -->
<div class="modal fade" id="artist-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                <h4 class="modal-title">アーティスト登録</h4>
            </div>
            <form method="post" action="/artist/save/">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="sr-only control-label" for="artist-name">アーティスト名</label>
                        <input type="text" name="artist_name" class="form-control" id="artist-name" placeholder="アーティスト名を入力">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-primary" id="regist-artist">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#artist-modal').on('show.bs.modal', function (event) {
    console.log();
    var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
    var artist_id = button.data('id') //data-whatever の値を取得
    var artist_name = button.data('name') //data-whatever の値を取得
    var modal = $(this)  //モーダルを取得
    modal.find('.modal-body input#artist-name').val(artist_name) //inputタグにも表示
    modal.find('form').attr('action', '/artist/save/'+artist_id)
});
</script>

@endsection