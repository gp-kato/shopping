@extends('layout')

@section('title', 'Products | Furniture Design')

@section('content')
    <div class="content wrapper">
        <h1 class="page-title">Products</h1>
        <ul class="product-list">
            @foreach(range(1, 12) as $item)
                <li>
                    <a href="item{{ $item }}">
                        <img src="{{asset('img/item' . $item . '.jpg')}}">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>¥99,999 +tax</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <ul class="pagination">
            <li>1</li>
            <li><a href="/2">2</a></li>
        </ul>
    </div>
@endsection
