@extends('layout')

@section('title', 'Furniture Design')

@section('content')
    <div id="top" class="wrapper">
        <ul class="product-list">
            @foreach($products as $product)
                <li>
                <a href="{{ url('item/' . $product->id) }}">
                        <img src="{{asset('img/item' . $product->id . '.jpg')}}">
                        <p>{{ $product->name }}</p>
                        <p>¥{{ number_format($product->price) }} +tax</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <a class="link-text" href="/">View More</a>
    </div>
@endsection
