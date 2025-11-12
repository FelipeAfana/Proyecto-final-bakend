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
                <h2 class="text-center mb-4" style="color: #7c3aed; font-weight: bold;">Recuperar Contraseña</h2>

                <!-- Mensaje de éxito -->
                @if (session('status'))
                    <div class="alert alert-success" role="alert" style="border-radius: 10px; background-color: #d1fae5; border: 2px solid #10b981; color: #065f46;">
                        <strong>✓</strong> {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Correo Electrónico -->
                    <div class="mb-4">
                        <label for="email" class="form-label" style="color: #7c3aed; font-weight: 600;">Correo Electrónico:</label>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email" 
                            autofocus
                            placeholder="ejemplo@unab.edu.co"
                            style="border-radius: 10px; padding: 12px; border: 2px solid #e5e7eb;">
                        
                        @error('email')
                            <div class="text-danger mt-2" style="font-size: 0.9rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Texto informativo -->
                    <p class="text-muted mb-4" style="font-size: 0.9rem;">
                        Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                    </p>

                    <!-- Botón Enviar -->
                    <div class="d-grid mb-3">
                        <button 
                            type="submit" 
                            class="btn btn-lg" 
                            style="background-color: #a0ff4d; color: #000; font-weight: bold; border-radius: 25px; border: none; padding: 12px;">
                            Enviar Enlace de Recuperación
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

    a:hover {
        text-decoration: underline !important;
    }
</style>
@endsection
