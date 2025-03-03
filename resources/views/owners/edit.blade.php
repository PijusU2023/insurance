@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit owner</h1>
        <form action="{{ route('owners.update', $owner->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $owner->name }}" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ $owner->surname }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $owner->phone }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $owner->email }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $owner->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update info</button>
            <a href="{{ route('owners.index')}}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
