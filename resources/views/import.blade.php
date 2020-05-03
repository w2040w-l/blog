@extends('layouts.base')
@section('title', 'index')
@section('main')
    <ul class='list-inline'>
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/top'>
                {{ __('message.highest_voted') }}</a></li>
    </ul>
    {{ $quotes['a'] }}
@endsection
