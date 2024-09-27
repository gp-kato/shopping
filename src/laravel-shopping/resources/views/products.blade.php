@extends('layout')

@section('title', 'Products | Furniture Design')

@section('content')
    <div class="content wrapper">
        <h1 class="page-title">Products</h1>
        <ul class="product-list">
            @foreach($products as $product)
                <li>
                    <a href="{{ url('item/' . $product->id) }}">
                        <img src="{{asset($product->path )}}">
                        <p>{{ $product->name }}</p>
                        <p>¥{{ number_format($product->price) }} +tax</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <ul class="pagination">
            @for ($i = 1; $i <= $total_pages; $i++)
                <li>
                    @if ($i == $current_page)
                        <p>{{ $i }}</p> <!-- 現在のページにリンクしない -->
                    @else
                        <a href="?page={{ $i }}">{{ $i }}</a>
                    @endif
                </li>
            @endfor
        </ul>
    </div>
@endsection
