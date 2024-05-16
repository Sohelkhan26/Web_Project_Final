@extends('layout.form')
@section('title', 'Login')
@section('heading', 'Login')
@section('content')
{{--    diplay error message if any --}}

@if($errors->any())
    <small class="text-danger"> {{$errors -> first('email')}} </small>
@endif
    @if(Session::has('message'))
        <small class="text-danger">{{ Session::get('message')}}</small>
    @endif
    <label class="form-label text-light">Username :</label>
    <input type="text" class="form-control" name="username" required>
{{--    @error('username')--}}
{{--    <small class="text-danger">{{ $message }}</small>--}}
{{--    <br>--}}
{{--    @enderror--}}

    <label class="form-label text-light">Email :</label>
    <input type="email" class="form-control" name="email" required>
{{--    @error('email')--}}
{{--    <small class="text-danger">{{ $message }}</small>--}}
{{--    <br>--}}
{{--    @enderror--}}

    <label class="form-label text-light">Password :</label>
    <input type="password" class="form-control" name="password" required>
    <br>
    <a href="{{route('register.form')}}">New User? Register now.</a>
    <br>
<div class="two">
    <label><a href={{ route('forgot_password.view') }}>Forgot password?</a></label>
</div>
{{--    @error('password')--}}
{{--    <small class="text-danger">{{ $message }}</small>--}}
{{--    <br>--}}
{{--    @enderror--}}
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>

@endsection
