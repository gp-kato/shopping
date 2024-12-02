@extends('layout')

@section('title', 'edit | Furniture Design')

@section('content')
    <div class="content wrapper">
        <ul class="product-list">
            <div class="container">
                <h1>商品を編集</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name">商品名</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div>
                        <label for="price">価格</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div>
                        <label for="img ">画像</label>
                        <input type="file" name="path" id="path">
                        @if ($product->path)
                            <img src="{{ url($product->path) }}" alt="現在の画像" width="150">
                        @endif
                    </div>
                    <button type="submit">商品を更新</button>
                </form>
            </div>
        </ul>
    </div>
@endsection
