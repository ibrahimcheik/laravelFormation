@extends('layout')
 @section('title','ADD NEW CUSTOMER')

 @section('content')
<div class="row">
    <div class="col-12 text-uppercase text-bold text-xl-center">
    <h1 class="h3">create customer</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
    <form action="/customers" method="POST" class="pb-5">
            @include('customers.form')
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">ADD NEW CUSTOMER</button>
        </form>
    </div>
</div>
@endsection
