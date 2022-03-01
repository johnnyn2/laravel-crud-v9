@extends('layouts.root')
@section('content')
    <a href="/posts/create">Create a post</a>
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
                @if (!empty($post['picture_path']))
                <tr>
                    <td>cover photo</td>
                    <td>
                        <img width="50" height="50" src="{{ asset('upload_pictures/'.$post['picture_path']) }}" alt="">
                    </td>
                </tr>
                @endif
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
            <a href="/posts/{{ $post['id'] }}/edit">Edit</a>
            <form action="/posts/{{ $post['id'] }}" method="POST">
                @csrf
                {{-- transform POST request to DELETE request --}}
                @method('delete')
                <button type="submit" style="color: red;">Delete</button>
            </form>
        </div>        
    @endforeach
@endsection