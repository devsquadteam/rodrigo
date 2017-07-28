<?php
/**
 * Created by PhpStorm.
 * User: rodrigo_cursino
 * Date: 7/26/17
 * Time: 3:20 PM
 */
?>
@if(isset($customer))
    <form class="form-horizontal" method="POST" action="{{route('clientes.update',$customer->id)}}">
        <input type="hidden" name="_method" value="PUT">
        @else
            <form class="form-horizontal" method="POST" action="{{route('clientes.store')}}">

                @endif
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <!-- name -->
                <div class="form-group">
                    <div class="col-lg-1">
                        <label class="control-label">Name: </label>
                    </div>
                    <div class="col-lg-11">
                        <input class="form-control" type="text" name="name"
                               value="{{isset($customer) ? $customer->name : ''}}"/>
                    </div>
                </div>

                <!-- city and state -->
                <div class="form-group">

                    <!-- city -->
                    <div class="col-lg-1">
                        <label class="control-label">City: </label>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" type="text" name="city"
                               value="{{isset($customer) ? $customer->city : ''}}"/>
                    </div>

                    <!-- state -->
                    <div class="col-lg-1">
                        <label class="control-label">State: </label>
                    </div>

                    <!-- state select -->
                    <div class="col-lg-2">
                        <select class="form-control" name="state">
                            @if(isset($customer))
                                <option selected="selected" value="{{$customer->state}}">{{$customer->state}}</option>
                            @endif
                            @foreach($custumerForSelect as $state)
                                <option value="{{$state}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- birthdate -->
                    <div class="col-lg-1">
                        <label class="control-label">Birthdate: </label>
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" name="birthdate"
                               value="{{isset($birthdate) ? $birthdate : ''}}"/>
                    </div>
                </div>

                <!-- button special custumer -->
                <div class="form-group">

                    <!-- special custumer -->
                    <div class="col-lg-3">
                        <label class="special_costumer control-label">
                            Special Costumer
                            <input
                                type="checkbox"
                                name="special_customer"
                                 @if(isset($customer))
                                   value="{{$customer->special_customer}}"
                                   {{$customer->special_customer ? 'checked' : 0 }}
                                 @endif
                            >
                        </label>
                    </div>

                    <!-- button -->
                    <div class="col-lg-12">
                        <button class="pull-right btn btn-success">{{isset($customer) ? 'ATUALIZAR' : 'CADASTRAR'}}</button>
                        <a class="my_margin pull-right btn btn-primary" href="{{route('clientes.index')}}"><span
                                    class="glyphicon glyphicon-chevron-left"></span> VOLTAR</a>
                    </div>

                </div>
            </form>
