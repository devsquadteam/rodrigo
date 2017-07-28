<?php

namespace Charlie\Http\Controllers;

use Charlie\Customer;
use Charlie\Http\Requests\PurchaseFormRequest;
use Charlie\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $clientBuy = Customer::findOrFail($id);
        return view('layouts.edit')->with(compact('clientBuy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseFormRequest $request)
    {
        $purchase = new Purchase($request->only(['custumers_id', 'amount', 'description']));
        $id = $request->input('custumers_id');
        $purchase->save();
        return redirect()->route('compras.show',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Customer::find($id);
        $purchases = Purchase::where('custumers_id',$id)->get();
        $total = $this->total($id);
        return view ('purchases.index')->with(compact('client','purchases','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchaseUpdate = Purchase::findOrFail($id);
        $clientBuy = Customer::findOrFail($purchaseUpdate->custumers_id);
        return view ('layouts.edit')->with(compact('purchaseUpdate','clientBuy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseFormRequest $request, $id)
    {
        $data = $request->only(['custumers_id', 'amount', 'description']);
        $purchase = Purchase::findOrFail($id);
        $purchase->fill($data);
        $id = $request->input('custumers_id');

        $purchase->save();
        return redirect()->route('compras.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $delete)
    {
        $id = $request->input('client_id');
        $purchase = Purchase::findOrFail($delete);
        $purchase->delete();
        return redirect()->route('compras.show',$id);
    }

    private function total ($id) {
        $amount = Purchase::where('custumers_id',$id)->sum('amount');
        return $total = number_format($amount,2);
    }
}
