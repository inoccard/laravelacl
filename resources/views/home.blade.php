@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($posts as $post)
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
    <b>Autor: {{$post->user->name}}</b>
    @empty
        <p>Nenhum post cadastrado!</p>
    @endforelse
</div>
@endsection
