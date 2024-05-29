@extends('layout.sidebar')
@section('title', 'Create Contact')
@section('heading' , 'Create Contact')
@section('content')
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="POST" enctype="multipart/form-data" action="{{ route('contacts.store') }}">
                @csrf
                <label class="formbold-form-label">Image</label>
                <input type="file" class="formbold-form-input" name="image">
                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif

                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label">First name</label>
                        <input type="text" name="first_name" id="firstname" class="formbold-form-input" value="{{ old('first_name') }}">
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <label for="lastname" class="formbold-form-label">Last name</label>
                        <input type="text" name="last_name" id="lastname" class="formbold-form-input" value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label">Email</label>
                        <input type="email" name="email" id="email" class="formbold-form-input" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <label for="phone" class="formbold-form-label">Phone number</label>
                        <input type="text" name="phone" id="phone" class="formbold-form-input" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label">Address</label>
                    <input type="text" name="address" id="address" class="formbold-form-input" value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="company" class="formbold-form-label">Company</label>
                        <input type="text" name="company" class="formbold-form-input" value="{{ old('company') }}">
                        @if ($errors->has('company'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <label class="formbold-form-label">Job</label>
                        <input type="text" name="job" class="formbold-form-input" value="{{ old('job') }}">
                        @if ($errors->has('job'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('job') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
                    @if ($errors->has('birthdate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="country" class="formbold-form-label">Country</label>
                        <input type="text" name="country" id="country" class="formbold-form-input" value="{{ old('country') }}">
                        @if ($errors->has('country'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <label for="state" class="formbold-form-label">Division</label>
                        <input type="text" name="division" id="state" class="formbold-form-input" value="{{ old('division') }}">
                        @if ($errors->has('division'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('division') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="area" class="formbold-form-label">City</label>
                        <input type="text" name="city" id="area" class="formbold-form-input" value="{{ old('city') }}">
                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <label for="post" class="formbold-form-label">Zip code</label>
                        <input type="text" name="zip" id="post" class="formbold-form-input" value="{{ old('zip') }}">
                        @if ($errors->has('zip'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('zip') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" placeholder="Enter note">{{ old('note') }}</textarea>
                    @if ($errors->has('note'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="formbold-btn" type="submit">Register Now</button>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createcontacts.css') }}">
@endsection
