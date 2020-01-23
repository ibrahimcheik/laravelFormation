@extends('layout')
 @section('title','EDIT FOR' . $customer->name)

 @section('content')
<div class="row">
    <div class="col-12 text-uppercase text-bold text-xl-center">
    <h1 class="h3">Edit Customer {{ $customer->name }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
    <form action="/customers/{{ $customer->id }}" method="POST" class="pb-5">
            @method('PATCH')
            @include('customers.form')

            <button type="submit" class="btn btn-primary btn-lg btn-block">SAVE CUSTOMER</button>
        </form>
    </div>
</div>
@endsection
