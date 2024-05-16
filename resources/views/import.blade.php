@extends('layout.sidebar')
@section('title' , 'Import')
@section('content')
    <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".xlsx">
    <button type="submit">Import from Excel</button>
</form>
@endsection
