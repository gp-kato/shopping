@extends('layout')

@section('title', 'Add | Furniture Design')

@section('content')
    <div class="content wrapper">
        <ul class="product-list">
            <li>
                <h1>Add New Product</h1>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="path">Image</label>
                        <input type="file" name="path" id="path">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price">
                    </div>
                    <button type="submit">Add Product</button>
                </form>
            </li>
        </ul>
    </div>
@endsection
