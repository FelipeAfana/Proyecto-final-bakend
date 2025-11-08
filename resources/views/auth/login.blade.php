@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style_login.css') }}">

@section('content')
<div class="auth-container">
    <div class="auth-wrapper">
        <div class="auth-card">
            <!-- Logo -->
            <div class="auth-logo">
                <img src="{{ asset('imagenes/logo_salitre1.png') }}" alt="Salitre Mágico">
            </div>

            <!-- Título -->
            <h2 class="auth-title">Iniciar Sesión</h2>

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input 
                        id="email" 
                        type="email" 
                        class="form-input @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Ejemplo@salitre.com"
                        required 
                        autocomplete="email" 
                        autofocus
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
                        autocomplete="current-password"
                    >
                    @error('password')
                        <span class="error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check-group">
                    <input 
                        class="form-checkbox" 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="remember">
                        Recuérdame
                    </label>
                </div>

                <!-- Botones -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        Ingresar
                    </button>

                    @if (Route::has('password.request'))
                        <a class="link-forgot" href="{{ route('password.request') }}">
                            ¿Olvidó su contraseña?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
