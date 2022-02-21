@extends('common')
@section('body')
    <h2>Product Info:</h2>
    @foreach ($products as $product)
        <p>Name: {{ $product['name'] }}</p>
        <p>Price: {{ $product['price'] }}</p>
    @endforeach 
@endsection