@extends('layouts.app')

@section('title', '商品詳細')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<h2 class="page-title">{{ $product->name }}の商品情報</h2>

<div class="detail-container">

    <div class="detail-image">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    </div>

    <div class="detail-info">

        <div class="detail-row">
            <label>商品名</label>
            <p>{{ $product->name }}</p>
        </div>

        <div class="detail-row">
            <label>価格</label>
            <p>¥{{ number_format($product->price) }}</p>
        </div>

        <div class="detail-row">
            <label>カテゴリ</label>
            <p>{{ $product->category }}</p>
        </div>

        <div class="detail-row">
            <label>商品説明</label>
            <p class="detail-description">{{ $product->description }}</p>
        </div>

        <div class="detail-actions">
            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">編集</a>

            <form action="{{ route('products.delete', $product->id) }}" method="POST">
                @csrf
                <button class="btn-delete">削除</button>
            </form>
        </div>
    </div>
</div>

@endsection
