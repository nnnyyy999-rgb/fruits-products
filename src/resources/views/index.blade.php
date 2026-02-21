@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<h2 class="page-title">商品一覧</h2>

<div class="product-search">
    <label for="keyword">商品名で検索</label>
    <input type="text" id="keyword" name="keyword">
    <button class="search-btn">検索</button>
</div>
<div class="sort-box">
    <label>価格順で表示</label>
    <select name="sort" onchange="this.form.submit()">
         <option value="">価格順に並べ替え</option>
         <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>安い順に表示</option>
         <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順に表示</option>
    </select>

    @if(request('sort'))
        <div class="selected-sort">
              {{ request('sort') == 'asc' ? '安い順に表示' : '高い順に表示' }}
        </div>
    @endif
</div>

<div class="product-list">
    @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
            <p class="product-name">{{ $product->name }}</p>
            <p class="product-price">¥{{ number_format($product->price) }}</p>
        </div>
    @endforeach
    
</div>

@endsection
