@extends('layout.sidebar')
@section('title' , 'Edit Contacts')
@section('heading' , 'Edit Contacts')
@section('content')

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="post" enctype="multipart/form-data" action = "{{route('contacts.update' , ['id' => $contact -> id])}}">
                @csrf
                <label class="formbold-form-label">Image</label>
                <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/' . $contact -> image) }}">
                <label class="formbold-form-label">Change Image</label>
                <input type="file" class="formbold-form-input" name="image">
                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label">
                            First name
                        </label>
                        <input
                            value="{{$contact->first_name}}"
                            type="text"
                            name="first_name"
                            id="firstname"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="lastname" class="formbold-form-label"> Last name </label>
                        <input
                            value="{{$contact->last_name}}"
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
                            value="{{$contact->email}}"
                            type="email"
                            name="email"
                            id="email"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="phone" class="formbold-form-label"> Phone number </label>
                        <input
                            value="{{$contact->phone}}"
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
                        value="{{$contact->address}}"
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
                            value="{{$contact->company}}"
                            type="text"
                            name="company"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label class="formbold-form-label"> Job </label>
                        <input
                            value="{{$contact->job}}"
                            type="text"
                            name="job"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{$contact->birthdate}}">
                </div>

                {{--                --}}
                <div class="formbold-input-flex">
                    <div>
                        <label for="country" class="formbold-form-label"> Country </label>
                        <input
                            value="{{$contact->country}}"
                            type="text"
                            name="country"
                            id="country"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="state" class="formbold-form-label"> Division </label>
                        <input
                            value="{{$contact->division}}"
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
                            value="{{$contact->city}}"
                            type="text"
                            name="city"
                            id="area"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="post" class="formbold-form-label"> Zip code </label>
                        <input
                            value="{{$contact->zip}}"
                            type="text"
                            name="zip"
                            id="post"
                            class="formbold-form-input"
                        />
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea  class="form-control" id="note" name="note" placeholder="{{$contact->note}}"></textarea>
                </div>
{{--                <button class="formbold-btn" type = "submit">Update</button>--}}
                <div class="mt-5 text-center"><button class="learn-more" type="submit">Update Contact</button></div>

            </form>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
    <link rel="stylesheet" href="{{asset('css/createcontacts.css')}}">
@endsection
