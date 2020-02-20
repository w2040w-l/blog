@extends('layouts.base')
@section('title', 'tags')
@section('appheader', "")
@section('main')
    <div class='row'>
        @foreach($tags as $tag)
            <div class="card col-md-3">
                <div class='card-body'>
                    <h4><a href='/tag/{{ $tag->id }}'>{{ $tag->title }}</a></h5>
                </div>
            </div>
        @endforeach
    </div>
    <a class='btn btn-primary' href='/tag/create'>make a new tag</a>
@endsection
