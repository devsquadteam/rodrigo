<?php

namespace Charlie\Http\Controllers;

use Carbon\Carbon;
use Charlie\Customer;
use Charlie\Http\Requests\CustomersFormRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::Paginate(5);
        return view('customers.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $custumerForSelect = $this->state();
        return view('layouts.edit')->with(compact('custumerForSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomersFormRequest $request)
    {
        $data = $request->only('name', 'city', 'birthdate', 'state','special_customer');
        $data['special_customer'] = isset($data['special_customer']);
        $customer = new Customer($data);
        $customer->save();
        return redirect()->route('clientes.index')->with(['success' => 'Client Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $date = new Carbon($customer->birthdate);
        $birthdate= $date->format('Y-m-d');

        $custumerForSelect = $this->state();

        return view('layouts.edit')->with(compact('customer','custumerForSelect','birthdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomersFormRequest $request, $id)
    {
        $data = $request->only('name', 'city', 'birthdate', 'state','special_customer');
        $data['special_customer'] = isset($data['special_customer']);
        $custumer = Customer::findOrFail($id);
        $custumer->fill($data);
        $custumer->save();
        return redirect()->route('clientes.index')->with(['success' => 'Client Saved']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('clientes.index')
            ->with(['success' => 'Client Deleted']);
    }

    private function state() {
        $custumerForSelect = Customer::groupBy('state')->
        get(['state'])->
        pluck('state','state');
        return $custumerForSelect;
    }
}
