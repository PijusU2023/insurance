@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
            <h2>{{ __('messages.add_car') }}</h2>
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.registration') }}</label>
                    <input type="text" name="reg_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.brand') }}</label>
                    <input type="text" name="brand" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.model') }}</label>
                    <input type="text" name="model" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.owner') }}</label>
                    <select name="owner_id" class="form-control" required>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">{{ __('messages.save') }}</button>
            </form>
        @else
            <div class="alert alert-warning">
                {{ __('messages.no_permission_add_car') }}
            </div>
        @endif
    </div>
@endsection
