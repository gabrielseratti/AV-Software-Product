@extends('layouts.app')
@section('title', $post->title)
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2>{{ $post->title }}</h2>
                <p class="text-muted">
                    📁 {{ $post->category->name }} |
                    🏷️ {{ $post->tag }} |
                    👤 {{ $post->user->name }} |
                    📅 {{ $post->created_at->format('d/m/Y') }}
                </p>
                <p class="lead">{{ $post->summary }}</p>
                <hr>
                <p>{{ $post->content }}</p>
                <hr>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Voltar</a>
                @auth
                    @if(Auth::id() === $post->user_id)
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Deletar?')">Deletar</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection