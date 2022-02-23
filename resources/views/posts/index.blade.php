@extends('layouts.app')
@section('body')
    <h3>Total</h3>
    <p>{{ $total }}</p>
    <h3>Avg</h3>
    <p>{{ $avg }}</p>
    @foreach ($posts as $post)
        <div>
            <table>
                <tr>
                    <td>id</td>
                    <td>{{ $post['id'] }}</td>
                </tr>
                <tr>
                    <td>title</td>
                    <td>{{ $post['title'] }}</td>
                </tr>
                <tr>
                    <td>body</td>
                    <td>{{  $post['body'] }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $post['created_at'] }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $post['updated_at'] }}</td>
                </tr>
            </table>
        </div>        
    @endforeach
@endsection