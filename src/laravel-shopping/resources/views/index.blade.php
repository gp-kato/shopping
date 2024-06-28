@extends('layout')

@section('title', 'Furniture Design')

@section('content')
    <div id="top" class="wrapper">
        <ul class="product-list">
            @foreach(range(1, 8) as $item)
                <li>
                    <a href="item{{ $item }}">
                        <img src="{{asset('img/item' . $item . '.jpg')}}">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>¥99,999 +tax</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <a class="link-text" href="products">View More</a>
    </div>
@endsection
