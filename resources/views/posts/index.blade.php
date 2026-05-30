@extends('layouts.app')
@section('title', 'Posts')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card mb-4">
            <div class="card-header"><strong>🔍 Filtros</strong></div>
            <div class="card-body">
                <form action="{{ route('posts.index') }}" method="GET">
                    <div class="mb-2">
                        <label>Título</label>
                        <input type="text" name="title" class="form-control form-control-sm" value="{{ request('title') }}">
                    </div>
                    <div class="mb-2">
                        <label>Tag</label>
                        <input type="text" name="tag" class="form-control form-control-sm" value="{{ request('tag') }}">
                    </div>
                    <div class="mb-2">
                        <label>Categoria</label>
                        <select name="category_id" class="form-control form-control-sm">
                            <option value="">Todas</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">Filtrar</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm w-100 mt-1">Limpar</a>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <h2>📰 Posts <span class="badge bg-secondary">{{ $posts->total() }}</span></h2>

        @forelse($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
                    <p class="text-muted mb-1">
                        <small>
                            📁 {{ $post->category->name }} |
                            🏷️ {{ $post->tag }} |
                            👤 {{ $post->user->name }} |
                            📅 {{ $post->created_at->format('d/m/Y') }}
                        </small>
                    </p>
                    <p>{{ $post->summary }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">Ler mais</a>
                    @auth
                        @if(Auth::id() === $post->user_id)
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Deletar?')">Deletar</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @empty
            <div class="alert alert-info">Nenhum post encontrado.</div>
        @endforelse

        {{ $posts->links() }}
    </div>
</div>
@endsection