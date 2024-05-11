@extends('layout.form')
@section('title', 'Login')
@section('heading', 'Login')
@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-danger">{{ Session::get('msg') }}</div>
        @endif
    <label class="form-label text-light">Username :</label>
    <input type="text" class="form-control" name="username" required>

    <label class="form-label text-light">Email :</label>
    <input type="email" class="form-control" name="email" required>

    <label class="form-label text-light">Password :</label>
    <input type="password" class="form-control" name="password" required>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
@endsection
