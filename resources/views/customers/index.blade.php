 @extends('layout')
 @section('title','CUSTOMERS LIST')

 @section('content')
 <p class=""><a href="customers/create" class="link">ADD NEW CUSTOMER</a></p>

    <div class="row">
        @foreach ($customers as $customer)
            <div class="col-2">
                {{$customer->id}}
            </div>
            <div class="col-4">
                <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>    
            </div>
            <div class="col-4">
                {{ $customer->company->name }}
            </div>
            <div class="col-2">
                {{-- {{ $customer->active ? 'Active' : 'Inactive' }} --}}
                {{ $customer->active }}
            </div>
        @endforeach
    </div>
    <hr><hr><hr>
    <div class="row">
        <div class="col-6">
            <h3 class="h3 text-uppercase text-bold text-xl-center">Active Customers</h3>
            <table class="table table-bordered text-center text-uppercase">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($activeCustomers as $customers)
                    <tr>
                        <td>{{ $customers->id }}</td>
                        <td>{{ $customers->name }}</td>
                        <td>{{ $customers->email }}</td>
                        <td>{{ $customers->company->name }}</td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot class="">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                         <th scope="col">Email</th>
                        <th scope="col">Company</th>
                    </tr>
                </tfoot>
              </table>
        </div>
    
        <div class="col-6">
            <h3 class="h3 text-uppercase text-bold text-xl-center">Inactive Customers</h3>
            <table class="table table-bordered text-center text-uppercase">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($inactiveCustomers as $customers)
                    <tr>
                        <td>{{ $customers->id }}</td>
                        <td>{{ $customers->name }}</td>
                        <td>{{ $customers->email }}</td>
                        <td>{{ $customers->company->name }}</td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                         <th scope="col">Email</th>
                        <th scope="col">Company</th>
                    </tr>
                </tfoot>
              </table>
        </div>
    </div>
    
    <h3 class="h3 text-uppercase text-bold text-xl-center">
        List Companies with there customers
    </h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                @foreach ($companies as $company)
                <thead class="thead-dark">
                    <tr>
                        <th>               
                            {{ $company->name }}   
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>
                                @foreach ($company->customers as $customer)
                                    {{ $customer->name }}
                                @endforeach
                            </td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>


   {{--  <ul>
        @foreach ($customerslist as $customers)
            <li>{{ $customers->name }}</li>
            <li>{{ $customers->email }}</li>
        @endforeach
    </ul> --}}



     {{-- <ul>
        @php
        foreach($customerslist as $customer){
            echo '<li>' . $customer->name . '</li>';
            echo '<li>' . $customer->email . '</li>';
        }
        @endphp
    </ul> --}}
@endsection
