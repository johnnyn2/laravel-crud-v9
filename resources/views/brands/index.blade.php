@extends('layouts.app')
@section('body')
    <table>
        <thead>
            <th>Name</th>
            <th>Description</th>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand['name'] }}</td>
                <td>{{ $brand['description'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection