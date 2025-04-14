@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Owners List</h2>

        @auth
            @if(in_array(auth()->user()->role, ['admin', 'user']))
                <a href="{{ route('owners.create') }}" class="btn btn-success mb-3">Add Owner</a>
            @endif
        @endauth

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($owners as $owner)
                <tr>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->surname }}</td>
                    <td>{{ $owner->phone }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>
                        @auth
                            @if(in_array(auth()->user()->role, ['admin', 'user']))
                                <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @endif

                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this owner?')">Delete</button>
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
