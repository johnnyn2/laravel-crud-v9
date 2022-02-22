@extends('layouts.app')
@section('body')
    {{ request('name').' '.request('id') }}
@endsection