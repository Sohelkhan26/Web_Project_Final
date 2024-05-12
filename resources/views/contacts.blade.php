@extends('layout.sidebar')
@section('title' , 'Contacts')
@section('content')
    <div class="content">

        <div class="container">
            <h2 class="mb-5">Table #6</h2>


            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                    <tr>

                        <th scope="col">Order</th>
                        <th scope="col">Name</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Education</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>4616</td>
                        <td><a href="#">Matthew Wasil</a></td>
                        <td>
                            Graphic Designer
                            <small class="d-block">Far far away, behind the word mountains</small>
                        </td>
                        <td>+02 020 3994 929</td>
                        <td>London College</td>
                        <td><a href="#" class="more">Details</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>

    </div>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary position-fixed bottom-0 end-0 m-3" style="font-size: 2rem;">+</a>

@endsection
