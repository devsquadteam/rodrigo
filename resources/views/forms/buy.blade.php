<?php
/**
 * Created by PhpStorm.
 * User: rodrigo_cursino
 * Date: 7/28/17
 * Time: 9:17 AM
 */
?>
    @if(isset($purchaseUpdate))
        <form class="form-horizontal" method="POST" action="{{route('compras.update',$purchaseUpdate->id)}}">
            <input type="hidden" name="_method" value="PUT">
    @else
        <form class="form-horizontal" method="POST" action="{{route('compras.store')}}">

    @endif
        <input name="_token"  type="hidden"  value="{{ csrf_token() }}">

        <div class="col-lg-12">
            <input name="custumers_id" type="hidden" value="{{$clientBuy->id}}"/>
            <input name="_token"  type="hidden"  value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-lg-2">
                   <label class="control-label">Description</label>
                </div>
                <div class="col-lg-10">
                    <input class="form-control" type="text" name="description" value="{{isset($purchaseUpdate) ? $purchaseUpdate->description :''}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-2">
                    <label class="control-label">Amount</label>
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="number" name="amount" placeholder="170.50" value="{{isset($purchaseUpdate) ? $purchaseUpdate->amount :'170.50'}}" step="0.50" min="170.50">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                 <button class="btn btn-lg btn-success pull-right">{{isset($purchaseUpdate) ? 'UPDATE' :'BUY'}}</button>
                 <a class="my_margin pull-right btn btn-lg btn-primary" href="{{route('clientes.index')}}"><span class="glyphicon glyphicon-chevron-left"></span> VOLTAR</a>
                </div>
            </div>
        </div>
    </form>
