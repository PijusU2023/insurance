@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->role === 'admin')
            <h2>Edit Car</h2>
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Registration Number</label>
                    <input type="text" name="reg_number" class="form-control" value="{{ $car->reg_number }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Owner</label>
                    <select name="owner_id" class="form-control" required>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}" @if ($car->owner_id == $owner->id) selected @endif>
                                {{ $owner->name }} {{ $owner->surname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        @else
            <div class="alert alert-danger">You do not have permission to edit cars.</div>
        @endif
    </div>
@endsection
