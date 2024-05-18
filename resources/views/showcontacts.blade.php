@extends('layout.sidebar')
@section('title' , 'Contacts')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background: #1a202c;
        }
    </style>
    <div class="content" style="background: #1a202c">

        <div class="container">
            <h2 class="mb-5">All Contacts</h2>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>

                        <th scope="col"><a href="{{ route('contacts', ['sortField' => 'first_name', 'sortDirection' => 'asc']) }}">
                                First Name
                            </a></th>
                        <th scope="col"><a href="{{route('contacts',['sortField'=>'last_name' , 'sortDirection' =>   'asc' ])}}">Last Name</a></th>
                        <th scope="col"><a href="{{route('contacts' ,['sortField'=>'email' , 'sortDirection' =>   'asc' ])}}">Email</a></th>
                        <th scope="col"><a href="{{route('contacts' ,['sortField'=>'phone' , 'sortDirection' =>   'asc' ])}}">Phone</a></th>
                        <th scope="col"><a href="{{route('contacts' ,['sortField'=>'address' , 'sortDirection' =>   'asc' ])}}">Address</a></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->first_name}}</td>
                            <td>{{$contact->last_name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->address}}</td>
{{--                            {{route('contacts.edit')}}                      --}}
                            <td><a href="{{route('contacts.edit' , ['id' => $contact->id])}}" class="more">Details</a></td>
                            <td><a href="{{route('contacts.delete' , ['id' => $contact->id])}}" class="more">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/showcontacts.css')}}">
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
    <div class="mt-5 text-center">
        <button class="learn-more" type="submit"><a href="{{ route('contacts.create') }}">Add Contact</a></button>
        <a href="{{ route('contacts.export') }}">Export to Excel</a>
    </div>
{{--    <a href="{{ route('contacts.create') }}" class="learn-more  position-fixed bottom-0 end-0 m-3" style="font-size: 2rem;">+</a>--}}
@endsection
