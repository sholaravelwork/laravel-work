@extends('layouts.app')

@section('content')

<!-- トリガー -->
<form action="/upload/image/upload" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <input type="submit">
</form>
@endsection
