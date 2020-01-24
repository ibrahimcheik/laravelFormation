<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //active && inactive are scope (query) declared in the model customer
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $customers = Customer::all();
        $companies = Company::all();
        return view('customers.index', compact('activeCustomers','inactiveCustomers','companies','customers'));

        //$activeCustomers = Customer::where('active', 1)->get();
        //$inactiveCustomers = Customer::where('active', 0)->get();
        //$customers = Customer::all();
        //dd($customers);
        /* return view('internals.customers',[
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
        ]); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $customer  = new Customer();
        return view('customers.create', compact('companies','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     private function validateRequest()
     {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:10|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
     }

    public function store(Request $request)
    {
        Customer::create($this->validateRequest());

        return redirect('customers');

         /*$customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();*/
        //dd(request('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //$customer = Customer::find($id);
        $customer = Customer::where('id', $id)->firstOrFail();
        return view('customers.show', compact('customer'));
    }*/
    //Route Model Binding
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Customer $customer)
    {
         $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:10|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
        $customer->update($data);

        return redirect('customers/' . $customer->id);
    }

    public function update1(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
