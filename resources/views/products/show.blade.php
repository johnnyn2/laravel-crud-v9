@extends('layouts.root')
@section('content')
    {{ request('name').' '.request('id') }}
    <h3>Product Info</h3>
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
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>{{ $product['tag'] }}</td>
                <td>{{ $product['target'] }}</td>
            </tr>
        </tbody>
    </table>
    <h3>Category</h3>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($product->categories as $category)
            <tr>
                <td>
                    {{ $category->id }}
                </td>
                <td>
                    {{ $category->name }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2">No category</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection