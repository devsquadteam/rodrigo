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
      CLIENTS MANAGER
    @stop
@section('content')
    @if(count($errors->all()) > 0)
        <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if (Session::has('success'))
        <div class="success text-center alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
        <tr class="">
            <th>Name</th>
            <th>City/State</th>
            <th>birthdate</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer )
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->city .'  /  '. $customer->state}}</td>
                <td>{{$customer->birthdate->format('Y-m-d')}}</td>
                <form method="post" action="{{route('clientes.destroy',$customer->id)}}">
                   @include('forms.delete')
                    <td class="text-center">
                        <a class="btn btn-xs btn-primary" href="{{route('clientes.edit',$customer->id)}}">EDIT</a>
                        <button class="btn btn-xs btn-danger">DELETE</button>
                        <a class="btn btn-xs btn-success" href="{{route('compras.show',$customer->id)}}">COMPRAR</a>
                    </td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $customers->links() !!}
    </div>
    <div class="text-center">
        <a class="btn btn-lg btn-success" href="{{route('clientes.create')}}">CREATE</a>
    </div>
@stop
