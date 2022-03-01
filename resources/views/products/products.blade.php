@extends('layouts.root')
{{-- 
    for loop
    foreach loop
    forelse loop <- display other output when the array is empty
    while loop
--}}
@section('content')
    <h2>Product Info:</h2>
    @foreach ($products as $product)
        <div style="border: 1px solid black;">
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
            <p> Target: 
                @switch($product['target'])
                    @case('children')
                        0-12
                        @break
                    @case('teenager')
                        13-17
                        @break
                    @default
                        > 18
                @endswitch
            </p>
            <p><a href="/products/{{ $product['id'] }}">View</a></p>
        </div>
    @endforeach
    @forelse ($empty as $e)
        <p>{{ $e }}</p>        
    @empty
        <h3>Empty array in forelse loop</h3>
    @endforelse
    <a href="{{  route('products') }}">Products</a>
    <a href="{{  route('string') }}">String route</a>    
@endsection