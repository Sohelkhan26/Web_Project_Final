@extends('layout.form')
@section('title', 'Register')
@section('heading', 'Register')
@section('content')
    <label class="form-label text-light">Image :</label>
    <input type="file" class="form-control" name="image" required>
    @error('image')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">First Name:</label>
    <input type="text" class="form-control" name="first_name" required>
    @error('first_name')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">Last Name:</label>
    <input type="text" class="form-control" name="last_name" required>
    @error('last_name')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror



    <label class="form-label text-light">Username :</label>
    <input type="text" class="form-control" name="username" required>
    @error('username')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">Email :</label>
    <input type="email" class="form-control" name="email" required>
    @error('email')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">Address :</label>
    <input type="text" class="form-control" name="address" required>
    @error('address')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">City :</label>
    <input type="text" class="form-control" name="city" required>
    @error('city')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">Division :</label>
    <select class="form-select" name="division" required>
        <option selected>Dhaka...</option>
        <option>Khulna</option>
        <option>Rajshahi</option>
        <option>Chittagong</option>
        <option>Jessore</option>
    </select>

    <label class="form-label text-light">Zip :</label>
    <input type="text" class="form-control" name="zip" required>
    @error('zip')
    <small class="text-danger">{{ $message }}</small>
    <br>
    @enderror

    <label class="form-label text-light">Phone :</label>
    <input type="number" class="form-control" name="phone" required>



    <label class="form-label text-light">Password :</label>
    <input type="password" class="form-control" name="password" required>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
@endsection
