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
        <button class="add-to-cart">カートに追加</button>
      </div>
    </div>
    <a class="link-text" href="/">Back To Products</a>
  </div>
@endsection
