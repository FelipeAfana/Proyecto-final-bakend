@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0" style="border-radius: 30px; border: 3px solid #a0ff4d;">
            <div class="card-body p-5">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('imagenes/logo_salitre1.png') }}" alt="Salitre Mágico" style="width: 120px;">
                </div>

                <!-- Título -->
                <h2 class="text-center mb-4" style="color: #7c3aed; font-weight: bold;">Restablecer Contraseña</h2>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #7c3aed; font-weight: 600;">Correo Electrónico:</label>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ $email ?? old('email') }}" 
                            required 
                            autocomplete="email" 
                            autofocus
                            style="border-radius: 10px; padding: 12px; border: 2px solid #e5e7eb;">
                        
                        @error('email')
                            <div class="text-danger mt-2" style="font-size: 0.9rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: #7c3aed; font-weight: 600;">Nueva Contraseña:</label>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            style="border-radius: 10px; padding: 12px; border: 2px solid #e5e7eb;">
                        
                        @error('password')
                            <div class="text-danger mt-2" style="font-size: 0.9rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                        <label for="password-confirm" class="form-label" style="color: #7c3aed; font-weight: 600;">Confirmar Contraseña:</label>
                        <input 
                            id="password-confirm" 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            style="border-radius: 10px; padding: 12px; border: 2px solid #e5e7eb;">
                    </div>

                    <!-- Botón Restablecer -->
                    <div class="d-grid mb-3">
                        <button 
                            type="submit" 
                            class="btn btn-lg" 
                            style="background-color: #a0ff4d; color: #000; font-weight: bold; border-radius: 25px; border: none; padding: 12px;">
                            Restablecer Contraseña
                        </button>
                    </div>

                    <!-- Link volver a login -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" style="color: #7c3aed; text-decoration: none;">
                            ¿Volver al inicio de sesión?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }
    
    .form-control:focus {
        border-color: #a0ff4d;
        box-shadow: 0 0 0 0.2rem rgba(160, 255, 77, 0.25);
    }
    
    .btn:hover {
        background-color: #8fef3d !important;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
</style>
@endsection
