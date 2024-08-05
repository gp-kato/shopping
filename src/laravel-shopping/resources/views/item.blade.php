@extends('layout')

@section('title', 'プロダクトタイトル | Furniture Design')

@section('content')
  <div class="content wrapper">
    <h1 class="page-title">Products</h1>
    <div id="item">
      <div class="item-img">
        <img src="{{asset('img/item' . $slug . '.jpg')}}">
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
        <p>&yen;99,999 +tax</p>
        <dl>
          <dt>SIZE：</dt>
          <dd>W999 × D999 × H999</dd>
          <dt>COLOR：</dt>
          <dd>テキスト</dd>
          <dt>MATERIAL：</dt>
          <dd>テキストテキストテキスト</dd>
        </dl>
        <p>{{ $product->id }}</p>

        <p>{{ $product->name }}</p>

        <p>{{ $product->price }}</p>
        <form method="post" action="{{ route('add') }}">
          @csrf
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="name" value="{{ $product->name }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <button class="add-to-cart">カートに追加</button>
        </form>
      </div>
    </div>
    <a class="link-text" href="/">Back To Products</a>
  </div>
@endsection
