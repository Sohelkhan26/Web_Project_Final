@extends('layout.sidebar')
@section('title', 'Create Contact')
@section('heading' , 'Create Contact')
@section('content')
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="POST" enctype="multipart/form-data" action = "{{route('contacts.store')}}">
                @csrf
                <label class="formbold-form-label">Image</label>
                <input type="file" class="formbold-form-input" name="image" required>
                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label">
                            First name
                        </label>
                        <input
                            type="text"
                            name="first_name"
                            id="firstname"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="lastname" class="formbold-form-label"> Last name </label>
                        <input
                            type="text"
                            name="last_name"
                            id="lastname"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> Email </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="phone" class="formbold-form-label"> Phone number </label>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label">
                        Address
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="formbold-form-input"
                    />
                </div>
{{--                --}}

                <div class="formbold-input-flex">
                    <div>
                        <label for="company" class="formbold-form-label"> Company </label>
                        <input
                            type="text"
                            name="company"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label class="formbold-form-label"> Job </label>
                        <input
                            type="text"
                            name="job"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                </div>

{{--                --}}
                <div class="formbold-input-flex">
                    <div>
                        <label for="country" class="formbold-form-label"> Country </label>
                        <input
                            type="text"
                            name="country"
                            id="country"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="state" class="formbold-form-label"> Division </label>
                        <input
                            type="text"
                            name="division"
                            id="state"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="area" class="formbold-form-label"> City </label>
                        <input
                            type="text"
                            name="city"
                            id="area"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="post" class="formbold-form-label"> Zip code </label>
                        <input
                            type="text"
                            name="zip"
                            id="post"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" placeholder="Enter note"></textarea>
                </div>

                <button class="formbold-btn" type = "submit">Register Now</button>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
    <link rel="stylesheet" href="{{asset('css/createcontacts.css')}}">
@endsection
