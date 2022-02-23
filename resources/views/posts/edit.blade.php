@extends('layouts.app')
@section('body')
    <form action="/posts/{{ $post['id'] }}" method="POST" style="display: flex; flex-direction: column;">
        @csrf
        {{-- transform a POST request to a PUT request --}}
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post['title'] }}">
        <label for="body">Body</label>
        <input type="text" name="body" value="{{ $post['body'] }}">
        <button type="submit">Submit</button>
    </form>
@endsection