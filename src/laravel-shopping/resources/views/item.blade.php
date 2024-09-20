@extends('layout')

@section('title', 'プロダクトタイトル | Furniture Design')

@section('content')
    <div class="content wrapper">
        <h1 class="page-title">Products</h1>
        <div id="item">
            @isset($product)
                <div class="item-img">
                    <img src="{{ asset('img/' . $product->path )}}">
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
                    <p>¥{{ number_format($product->price) }} 円 +tax</p>
                    <dl>
                        <dt>SIZE：</dt>
                        <dd>W999 × D999 × H999</dd>
                        <dt>COLOR：</dt>
                        <dd>テキスト</dd>
                        <dt>MATERIAL：</dt>
                        <dd>テキストテキストテキスト</dd>
                    </dl>
                    <form method="post" action="{{ route('add', ['product' => $product->id]) }}">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1">
                        <button class="add-to-cart">カートに追加</button>
                    </form>
                </div>
            @endisset
        </div>
        <a class="link-text" href="/">Back To Products</a>
    </div>
@endsection
