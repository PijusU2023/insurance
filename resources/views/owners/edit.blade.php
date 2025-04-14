@extends('layouts.app')

@section('content')
    <div class="container">
        @if(auth()->user()->role === 'viewer')
            <div class="alert alert-warning">You are not allowed to add owners.</div>
        @else
            <h1>Add a new owner</h1>
            <form action="{{ route('owners.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="surname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('owners.index')}}" class="btn btn-secondary">Back</a>
            </form>
        @endif
    </div>
@endsection
