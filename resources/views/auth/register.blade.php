@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style_reg.css') }}">

@section('content')
<div class="auth-container">
    <div class="auth-wrapper">
        <div class="auth-card">
            <!-- Logo -->
            <div class="auth-logo">
                <img src="{{ asset('imagenes/logo_salitre1.png') }}" alt="Salitre Mágico">
            </div>

            <!-- Título -->
            <h2 class="auth-title">Registrarse</h2>

            <!-- Formulario -->
            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name" class="form-label">Nombre:</label>
                    <input 
                        id="name" 
                        type="text" 
                        class="form-input @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') }}" 
                        placeholder="Tu nombre completo"
                        required 
                        autocomplete="name" 
                        autofocus
                    >
                    @error('name')
                        <span class="error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input 
                        id="email" 
                        type="email" 
                        class="form-input @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Ejemplo@gmail.com"
                        required 
                        autocomplete="email"
                    >
                    @error('email')
                        <span class="error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input 
                        id="password" 
                        type="password" 
                        class="form-input @error('password') is-invalid @enderror" 
                        name="password"
                        placeholder="**********"
                        required 
                        autocomplete="new-password"
                    >
                    @error('password')
                        <span class="error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password-confirm" class="form-label">Confirmar contraseña:</label>
                    <input 
                        id="password-confirm" 
                        type="password" 
                        class="form-input" 
                        name="password_confirmation"
                        placeholder="**********"
                        required 
                        autocomplete="new-password"
                    >
                </div>

                <!-- Checkbox de términos (opcional) -->
                <div class="form-check-group">
                    <input 
                        class="form-checkbox" 
                        type="checkbox" 
                        name="terms" 
                        id="terms"
                    >
                    <label class="form-check-label" for="terms">
                        Recuérdame
                    </label>
                </div>

                <!-- Botones -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        Crear Cuenta
                    </button>

                    <a class="link-forgot" href="{{ route('login') }}">
                        ¿Ya tienes cuenta? Inicia sesión
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
