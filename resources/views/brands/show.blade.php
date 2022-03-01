@extends('layouts.root')
@section('content')
    <h1>Name</h1>
    <p>{{ $brand['name'] }}</p>
    <h1>Description</h1>
    <p>{{ $brand['description'] }}</p>
    <h1>All products of brand {{ $brand['name'] }}</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Tag</th>
                <th>Target</th>
                <th>Manufactuer</th>
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
                    <td>
                        @foreach ($brand->manufacturers as $manufacturer)
                            @if ($manufacturer['product_id'] == $product['id'])
                                {{ $manufacturer['name'] }}
                            @endif                            
                        @endforeach
                    </td>
                </tr> 
            @empty
                <h3>This brand has no product</h3>
            @endforelse
        </tbody>
    </table>
@endsection