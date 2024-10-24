@extends('layout')

@section('title', 'Furniture Design')

@section('content')
    <h1>Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price">
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" id="quantity">
        </div>
        <button type="submit">Add Product</button>
    </form>
@endsection
