@extends('layout')

@section('title','Detail for' . $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
        <h3>Detail for {{ $customer->name }}</h3>
        <p><a href="/customers/{{ $customer->id }}/edit">edit</a></p>
        </div>
        <div class="col-12">
            <p>ID : {{ $customer->id }}</p>
            <p>NAME :  {{ $customer->name }}</p>
            <p>EMAIL :  {{ $customer->email }}</p>
            <p>Company : {{ $customer->company->name }}</p>
            <p>Status : {{ $customer->active }}</p>
        </div>
    </div>
@endsection
