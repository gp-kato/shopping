@extends('layout')

@section('title', 'edit | Furniture Design')

@section('content')
    <div class="content wrapper">
        <ul class="product-list">
            <div class="container">
                <h2>商品を編集</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">商品名</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">価格</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="img " class="form-label">画像</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="Current image" class="mt-3" width="150">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">商品を更新</button>
                </form>
            </div>
        </ul>
    </div>
@endsection
