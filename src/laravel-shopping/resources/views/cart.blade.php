@extends('layout')

@section('title', 'Cart | Furniture Design')

@section('content')
    <div class="content wrapper">
        <ul class="product-list">
            @if(!is_null($sessionData))
                @foreach($sessionData as $data)
                    <section>
                        <img src="{{asset('img/item' . $data['id'] . '.jpg')}}">
                        {{ $data['name'] }}
                        ¥{{ number_format($data['price']) }} 円
                        <span>
                            {{ $data['session_quantity'] }}
                        </span>
                        個
                        ¥{{ number_format($data['session_quantity'] * $data['price']) }}
                    </section>
                @endforeach
            @else
                <p>カートに商品がありません。</p>
            @endif
        </ul>
    </div>
@endsection
