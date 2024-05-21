@extends('layout.sidebar')
@section('title' , 'Contacts')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background: #1a202c;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function(e) {
                e.preventDefault();
                const query = $(this).val();
                // alert(query);
                $.ajax({
                    url: "{{route('contacts.search')}}",
                    type: "GET",
                    data: {'query': query},
                    success: function(data) {
                    let rows = '';
                    $.each(data, function(key, value) {
                        rows += '<tr>';
                        rows += '<td>' + value.first_name + '</td>';
                        rows += '<td>' + value.last_name + '</td>';
                        rows += '<td>' + value.email + '</td>';
                        rows += '<td>' + value.phone + '</td>';
                        rows += '<td>' + value.address + '</td>';
                        rows += '<td><a href="/contacts/' + value.id + '/edit" class="more">Details</a></td>';
                        rows += '<td><a href="/contacts/' + value.id + '/delete" class="more">Delete</a></td>';
                        rows += '</tr>';
                    });
                    $('.custom-table tbody').html(rows);
                }
                });
            });
        });
    </script>
    <div class="content" style="background: #1a202c">

        <div class="container">
            <h2 class="mb-5">All Contacts</h2>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('contacts.search') }}" method="GET">
                <input type="text" name="query" placeholder="Search contacts" id="search">
                <button type="submit">Search</button>
            </form>
            <div id="search-return"></div>
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
    </div>

@endsection


