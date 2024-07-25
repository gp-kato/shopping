@extends('layout')

@section('title', 'Products | Furniture Design')

@section('content')
    <div class="content wrapper">
        <h1 class="page-title">Products</h1>
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
        <ul class="pagination">
          <li>1</li>
          <li>2</li>
        </ul>
    </div>
@endsection
