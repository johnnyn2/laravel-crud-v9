@extends('layouts.app')
@section('body')
    <h1>Name</h1>
    <p>{{ $brand['name'] }}</p>
    <h1>Description</h1>
    <p>{{ $brand['description'] }}</p>
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Tag</th>
                <th>Target</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($brand->products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['tag'] }}</td>
                    <td>{{ $product['target'] }}</td>
                </tr> 
            @empty
                <h3>This brand has no product</h3>
            @endforelse
        </tbody>
    </table>
@endsection