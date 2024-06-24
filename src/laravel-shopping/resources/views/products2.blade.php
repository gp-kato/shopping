@extends('layout')

@section('title', 'Products | Furniture Design')

@section('content')
    @section('header', 'Products')
    <ul class="product-list">
        @foreach(range(13, 16) as $item)
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
        <li><a href="products2">2</a></li>
    </ul>
@endsection
