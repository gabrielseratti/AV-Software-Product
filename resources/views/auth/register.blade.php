@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<div style="max-width: 450px; margin: 3rem auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h1 style="text-align: center; margin-bottom: 2rem; color: #2c3e50;">Cadastro</h1>

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <div style="margin-bottom: 1.5rem;">
            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nome:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                required
                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;"
            >
            @error('name')
                <span style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">E-mail:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}"
                required
                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;"
            >
            @error('email')
                <span style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="password" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Senha:</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;"
            >
            @error('password')
                <span style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="password_confirmation" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Confirmar Senha:</label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                required
                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;"
            >
        </div>

        <button type="submit" class="btn" style="width: 100%; padding: 0.75rem; font-size: 1rem;">
            Cadastrar
        </button>
    </form>

    <p style="text-align: center; margin-top: 1.5rem; color: #7f8c8d;">
        Já tem uma conta? <a href="{{ route('login') }}" style="color: #3498db; text-decoration: none;">Faça login</a>
    </p>
</div>
@endsection