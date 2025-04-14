@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
            <h2>Add Car</h2>
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Registration Number</label>
                    <input type="text" name="reg_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Owner</label>
                    <select name="owner_id" class="form-control" required>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        @else
            <div class="alert alert-warning">
                You do not have permission to add a car.
            </div>
        @endif
    </div>
@endsection
