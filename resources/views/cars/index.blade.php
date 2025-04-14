@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Car List</h2>

        @auth
            @if(in_array(auth()->user()->role, ['admin', 'user']))
                <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">Add Car</a>
            @endif
        @endauth

        <table class="table">
            <thead>
            <tr>
                <th>Registration</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                    <td>
                        @auth
                            @if(in_array(auth()->user()->role, ['admin', 'user']))
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endif

                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this car?')">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
