@extends('layout.form')
@section('title', 'Forgot Password')
@section('heading', 'Forgot Password')
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

        <div>

            <label class="form-label text-light">Email :</label>
            <input type="email" class="form-control" name="email" required value="{{ old('email') }}" autofocus>
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        </div>
@endsection
