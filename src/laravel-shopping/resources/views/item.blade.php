@extends('layout')

@section('title', 'プロダクトタイトル | Furniture Design')

@section('content')
  <div class="content wrapper">
    <h1 class="page-title">Products</h1>
    <div id="item">
    @foreach($products as $product)
      <div class="item-img">
        <img src="{{ asset('img/item' . $slug . '.jpg')}}">
      </div>
      <div class="item-text">
        <p>
          テキストテキストテキストテキストテキストテキストテキストテキストテキスト
          テキストテキストテキストテキストテキストテキストテキストテキストテキスト
          テキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
        <p>
          テキストテキストテキストテキストテキストテキストテキストテキストテキスト
          テキストテキストテキストテキストテキストテキストテキストテキストテキスト
          テキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
        <p>¥{{ number_format($product->price) }} +tax</p>
        <dl>
          <dt>SIZE：</dt>
          <dd>W999 × D999 × H999</dd>
          <dt>COLOR：</dt>
          <dd>テキスト</dd>
          <dt>MATERIAL：</dt>
          <dd>テキストテキストテキスト</dd>
        </dl>
        <form method="post" action="{{ route('add') }}">
          @csrf
          <input type="hidden" name="id" value="{{ $slug }}">
          <input type="hidden" name="name" value="{{ $product->name }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <input type="number" name="quantity" value="1" min="1">
          <button class="add-to-cart">カートに追加</button>
        </form>
      </div>
    @endforeach
    </div>
    <a class="link-text" href="/">Back To Products</a>
  </div>
@endsection
