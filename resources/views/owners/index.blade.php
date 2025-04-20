@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('messages.owners_list') }}</h2>

        @auth
            @if(in_array(auth()->user()->role, ['admin', 'user']))
                <a href="{{ route('owners.create') }}" class="btn btn-success mb-3">{{ __('messages.add_owner') }}</a>
            @endif
        @endauth

        <table class="table">
            <thead>
            <tr>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.surname') }}</th>
                <th>{{ __('messages.phone') }}</th>
                <th>{{ __('messages.email') }}</th>
                <th>{{ __('messages.actions') }}</th>
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
                                <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary btn-sm">{{ __('messages.edit') }}</a>
                            @endif

                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.confirm_delete_owner') }}')">
                                        {{ __('messages.delete') }}
                                    </button>
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
