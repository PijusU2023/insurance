@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->role === 'admin')
            <h2>{{ __('messages.edit_car') }}</h2>
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.registration') }}</label>
                    <input type="text" name="reg_number" class="form-control" value="{{ $car->reg_number }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.brand') }}</label>
                    <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.model') }}</label>
                    <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.owner') }}</label>
                    <select name="owner_id" class="form-control" required>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}" @if ($car->owner_id == $owner->id) selected @endif>
                                {{ $owner->name }} {{ $owner->surname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
            </form>
        @else
            <div class="alert alert-danger">{{ __('messages.no_permission_edit_car') }}</div>
        @endif
    </div>
@endsection
