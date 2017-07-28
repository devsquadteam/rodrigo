<?php
/**
 * Created by PhpStorm.
 * User: rodrigo_cursino
 * Date: 7/25/17
 * Time: 4:27 PM
 */
?>
@extends('layouts.main')
    @section('page-title')
        @if (isset($customer))
            EDIT CLIENT
        @else
            CLIENT {{ isset($clientBuy) ? ' NAME: '.$clientBuy->name : ''}}
        @endif
    @stop
@section('content')
    @if(count($errors->all()) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                 <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="success alert alert-success text-center">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">@yield('page-title')</h3>
        </div>
        <div class="panel-body">
            <div class="col-lg-2">
               <span class="font {{isset($id) ? 'glyphicon glyphicon-shopping-cart' : 'text-center glyphicon glyphicon-user'}} "></span>
            </div>
            <div class="col-lg-10">
                @if(Request::is('admin/clientes/*'))
                    @include('forms.create_update')
                @endif
                @if(isset($clientBuy))
                   <!-- admin/compras/create?id=* -->
                    @include('forms.buy')
                @endif
                <!-- admin/compras/ -->
                <!-- path = purchases.index.blade -->
                    @yield('purchases')
            </div>
        </div>
    </div>
@stop
