@extends('layouts.app')
@section('body')
    <h2>Product Info:</h2>
    @foreach ($products as $product)
        <p>Name: {{ $product['name'] }}</p>
        <p>Price: {{ $product['price'] }}</p>
        <p>
            Tag: 
            @if (!empty($product['tag']))
                {{ $product['tag'] }}
            @else
                Not available
            @endif 
        </p>
    @endforeach
    <a href="{{  route('products') }}">Products</a>
    <a href="{{  route('string') }}">String route</a>    
@endsection