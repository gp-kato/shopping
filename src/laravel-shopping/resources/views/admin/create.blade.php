@extends('layout')

@section('title', 'Add | Furniture Design')

@section('content')
    <div class="content wrapper">
        <ul class="product-list">
            <div class="container">
                <h1>商品を入荷</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">商品名</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label for="price">価格</label>
                        <input type="number" name="price" id="price" required>
                    </div>
                    <div>
                        <label for="path">画像</label>
                        <input type="file" name="path" id="path" required>
                    </div>
                    <button type="submit">商品を入荷</button>
                </form>
            </div>
        </ul>
    </div>
@endsection
