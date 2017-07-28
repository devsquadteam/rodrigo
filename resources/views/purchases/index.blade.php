<?php
/**
 * Created by PhpStorm.
 * User: rodrigo_cursino
 * Date: 7/27/17
 * Time: 8:59 AM
 */
?>
@extends('layouts.edit')
@section('purchases')
    <form method="GET" action="{{route('compras.create')}}">
        <input name="id" type="hidden" value="{{$client->id}}"/>
        <div class="col-lg-5">
            <h3>{{'Name : '.$client->name}}</h3>
            <h4>{{'Birthdate : '.$client->birthdate->format('Y-m-d')}}</h4></br>
            @if($client->special_customer)
                <h4>
                    <span class="glyphicon glyphicon-star"></span>{{'Special Client'}}
                </h4>
            @endif
            <a class="my_margin btn btn-lg btn-primary" href="{{route('clientes.index')}}"><span
                        class="glyphicon glyphicon-chevron-left"></span> VOLTAR</a>
            <button class="btn btn-lg btn-success">BUY</button>
        </div>
    </form>
    <div class="col-lg-7">
        <div style="width: auto; height:25vh; overflow: auto;">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><h4>Purchases</h4></th>
                    <th><h4>Date</h4></th>
                    <th><h4>Delete</h4></th>
                    <th><h4>Update</h4></th>
                </tr>
                </thead>
                <tbody>
                @foreach($purchases as $purchase)
                    <tr class="text-center">

                        <td><h4>{{'U$ : '.number_format($purchase->amount,2)}}</h4></td>
                        <td><h4>{{$purchase->created_at->format('Y-m-d')}}</h4></td>

                        <form id="deletePurchase" method="POST" action="{{route('compras.destroy',$purchase->id)}}">
                            <input type="hidden" name="client_id" value="{{$client->id}}">
                            @include('forms.delete')
                            <td>
                                <button><h4><span class="glyphicon glyphicon-trash"></span></h4></button>
                            </td>
                        </form>

                        <td>
                            <button>
                                <a class="my_link my_update" href="{{route('compras.edit',$purchase->id)}}">
                                    <h4>
                                       <span class="glyphicon glyphicon-refresh"></span>
                                    </h4>
                                </a>
                            </button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <h3 class="pull-right">{{'Total U$: '.$total}}</h3>
    </div>
@stop