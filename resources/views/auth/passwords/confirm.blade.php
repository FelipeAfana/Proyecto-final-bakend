@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0" style="border-radius: 30px; border: 3px solid #a0ff4d;">
            <div class="card-body p-5">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('imagenes/logo-_salitre1.png') }}" alt="Salitre Mágico" style="width: 120px;">
                </div>

                <!-- Título -->
                <h2 class="text-center mb-3" style="color: #7c3aed; font-weight: bold;">Confirmar Contraseña</h2>

                <!-- Mensaje informativo -->
                <p class="text-center text-muted mb-4" style="font-size: 0.95rem;">
                    Por favor, confirma tu contraseña antes de continuar.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="form-label" style="color: #7c3aed; font-weight: 600;">Contraseña:</label>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            placeholder="**********"
                            style="border-radius: 10px; padding: 12px; border: 2px solid #e5e7eb;">
                        
                        @error('password')
                            <div class="text-danger mt-2" style="font-size: 0.9rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Botón Confirmar -->
                    <div class="d-grid mb-3">
                        <button 
                            type="submit" 
                            class="btn btn-lg" 
                            style="background-color: #a0ff4d; color: #000; font-weight: bold; border-radius: 25px; border: none; padding: 12px;">
                            Confirmar Contraseña
                        </button>
                    </div>

                    <!-- Link olvidaste tu contraseña -->
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a href="{{ route('password.request') }}" style="color: #7c3aed; text-decoration: none;">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    @endif
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
