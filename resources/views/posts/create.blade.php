@extends('layouts.app')
@section('body')
    <form action="/posts" method="POST" style="display: flex; flex-direction: column;">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title">
        <label for="body">Body</label>
        <input type="text" name="body">
        <button type="submit">Submit</button>
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>  
        @endforeach    
    @endif
@endsection