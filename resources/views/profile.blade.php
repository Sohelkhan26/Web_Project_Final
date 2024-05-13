@extends('layout.sidebar')
@section('title', 'Profile')
@section('content')
    <style>
        body {
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color: #3c373e;
            font-weight: 300; }
        p {
            color: rgba(255, 255, 255, 0.5);
            font-weight: 300; }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

        a {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        a, a:hover {
            text-decoration: none !important; }

        .content {
            padding: 7rem 0; }

        h2 {
            font-size: 20px;
            color: #fff; }

        .custom-table {
            min-width: 900px; }
        .custom-table thead tr, .custom-table thead th {
            padding-bottom: 30px;
            border-top: none;
            border-bottom: none !important;
            color: #fff;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .2rem; }
        .custom-table tbody th, .custom-table tbody td {
            color: #777;
            font-weight: 400;
            padding-bottom: 20px;
            padding-top: 20px;
            font-weight: 300;
            border: none;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .custom-table tbody th small, .custom-table tbody td small {
            color: rgba(255, 255, 255, 0.3);
            font-weight: 300; }
        .custom-table tbody th a, .custom-table tbody td a {
            color: rgba(255, 255, 255, 0.3); }
        .custom-table tbody th .more, .custom-table tbody td .more {
            color: rgba(255, 255, 255, 0.3);
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .2rem; }
        .custom-table tbody tr {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .custom-table tbody tr:hover td, .custom-table tbody tr:focus td {
            color: #fff; }
        .custom-table tbody tr:hover td a, .custom-table tbody tr:focus td a {
            color: #fdd114; }
        .custom-table tbody tr:hover td .more, .custom-table tbody tr:focus td .more {
            color: #fdd114; }
        .custom-table .td-box-wrap {
            padding: 0; }
        .custom-table .box {
            background: #fff;
            border-radius: 4px;
            margin-top: 15px;
            margin-bottom: 15px; }
        .custom-table .box td, .custom-table .box th {
            border: none !important; }

    </style>
    <form method = "POST" action="{{route('profile.update')}}">
        @csrf
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <!-- Replace the src attribute with the image path -->
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/' . $user -> image) }}">
                    <!-- Placeholder for name and email -->
                    <span class="font-weight-bold">{{$user -> first_name . $user -> last_name }}</span>
                    <span class="text-black-50">{{$user -> email}}</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <!-- Input fields for first name and last name -->
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" value="{{$user -> first_name}}" name = "first_name"></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{$user -> last_name}}" name = "last_name"></div>
                    </div>
                    <div class="row mt-3">
                        <!-- Input fields for address, city, phone, division, and zip -->
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" value="{{$user -> address}}" name = "address"></div>
                        <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" value="{{$user -> city}}" name = "city"></div>
                        <div class="col-md-12"><label class="labels">Phone</label><input type="text" class="form-control" value="{{$user -> phone}}" name = "phone"></div>
                        <div class="col-md-12"><label class="labels">Division</label><input type="text" class="form-control" value="{{$user -> division}}" name = "division"></div>
                        <div class="col-md-12"><label class="labels">Zip</label><input type="text" class="form-control" value="{{$user -> zip}}" name = "zip"></div>
                    </div>
                    <!-- Save Profile Button -->
                    <div class="mt-5 text-center"><button class="learn-more" type="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
@endsection
