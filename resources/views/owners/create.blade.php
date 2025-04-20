@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('messages.add_owner') }}</h1>
        <form action="{{ route('owners.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('messages.name') }}</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname">{{ __('messages.surname') }}</label>
                <input type="text" name="surname" id="surname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">{{ __('messages.phone') }}</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">{{ __('messages.email') }}</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">{{ __('messages.address') }}</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            <a href="{{ route('owners.index')}}" class="btn btn-secondary">{{ __('messages.back') }}</a>
        </form>
    </div>
@endsection
