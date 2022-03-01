@extends('layouts.root')
@section('content')
    <table>
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand['name'] }}</td>
                <td>{{ $brand['description'] }}</td>
                <td>
                    <a href="/brands/{{ $brand['id'] }}">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection