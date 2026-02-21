@extends('layouts.app')

@section('title', '商品登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<h2 class="page-title">商品登録</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf

    <div class="form-row">
        <label>商品名 <span class="required">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-row">
        <label>価格 <span class="required">*</span></label>
        <input type="number" name="price" value="{{ old('price') }}">
    </div>

    <div class="form-row">
        <label>カテゴリ</label>
        <select name="category">
            @foreach($categories as $cat)
                <option value="{{ $cat }}">{{ $cat }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-row">
        <label>商品画像</label>
        <input type="file" name="image">
    </div>

    <div class="form-row">
        <label>商品説明</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <div class="form-btns">
        <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
        <button class="btn-submit">登録</button>
    </div>
</form>

@endsection
