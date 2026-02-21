@extends('layouts.app')

@section('title', '商品編集')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')

<h2 class="page-title">商品編集</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-row">
        <label>商品名 <span class="required">*</span></label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </div>

    <div class="form-row">
        <label>価格 <span class="required">*</span></label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}">
    </div>

    <div class="form-row">
        <label>カテゴリ</label>
        <select name="category">
            @foreach($categories as $cat)
                <option value="{{ $cat }}" @if($cat == $product->category) selected @endif>{{ $cat }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-row">
        <label>現在の画像</label>
        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="edit-image">
    </div>

    <div class="form-row">
        <label>変更する場合は画像を選択</label>
        <input type="file" name="image">
    </div>

    <div class="form-row">
        <label>商品説明</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="form-btns">
        <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
        <button class="btn-submit">更新</button>
    </div>
</form>

@endsection
