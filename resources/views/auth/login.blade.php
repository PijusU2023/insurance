@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center h4">{{ __('messages.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('messages.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('messages.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('messages.remember_me') }}
                            </label>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                {{ __('messages.login') }}
                            </button>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary px-4 ms-2">
                                {{ __('messages.register') }}
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a class="small text-muted" href="{{ route('password.request') }}">
                                    {{ __('messages.forgot_password') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn {
            border-radius: 8px;
        }
        .card {
            border-radius: 12px;
            padding: 20px;
        }
    </style>
@endsection
