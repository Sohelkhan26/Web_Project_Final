@extends('layout.form')
@section('title', 'Reset Password')
@section('heading', 'Reset Password')
@section('content')
        <!-- Display status or errors if any -->
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Forgot password form -->
        <!-- reset-password.blade.php -->
        @if ($errors->has('email'))
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @endif

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email" class="form-label text-light">Email</label>
            <input id="email" type="email" name="email" required class="form-control">

            <label for="password" class="form-label text-center text-light">New Password</label>
            <input id="password" type="password" name="password" required class="form-control">

            <label for="password_confirmation" class="form-label text-light">Confirm New Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control">

            <button type="submit" class="btn btn-secondary">Reset Password</button>
@endsection
