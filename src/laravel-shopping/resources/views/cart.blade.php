@extends('layout')

@section('title', 'Cart | Furniture Design')

@section('content')
    <div class="content wrapper">
        <ul class="product-list">
            @if(!empty($sessionData))
                @foreach($sessionData as $data)
                    @if(!empty($data['id']) && !empty($data['name']) && !empty($data['price']) && !empty($data['session_quantity']))
                        <section>
                            <img src="{{asset('img/item' . $data['id'] . '.jpg')}}">
                            {{ $data['name'] }}
                            ¥{{ number_format($data['price']) }} 円 +tax
                            <span>
                                {{ $data['session_quantity'] }}
                            </span>
                            個
                            ¥{{ number_format($data['session_quantity'] * $data['price']) }}
                            <form method="post" action="{{ route('remove') }}">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                <button type="submit">削除</button>
                            </form>
                        </section>
                    @endif
                @endforeach
                <form method="post" action="{{ route('purchase') }}">
                    @csrf
                        @foreach($sessionData as $data)
                            <input type="hidden" name="items[{{ $data['id'] }}][name]" value="{{ $data['name'] }}">
                            <input type="hidden" name="items[{{ $data['id'] }}][price]" value="{{ $data['price'] }}">
                            <input type="hidden" name="items[{{ $data['id'] }}][quantity]" value="{{ $data['session_quantity'] }}">
                        @endforeach
                    <button type="submit">購入</button>
                </form>
            @else
                <p>カートに商品がありません。</p>
            @endif
        </ul>
    </div>
@endsection
