@extends('layouts.root')
@section('content')
    @if (Auth::user())
        <form action="/posts" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column;">
            @csrf
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="">
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
    @else
        <p>Please login first</p>
    @endif
    
@endsection