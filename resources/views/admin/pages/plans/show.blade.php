@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Plano: <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Detalhes do Plano
        </div>
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$plan->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{number_format($plan->price, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$plan->description}}
                </li>
            </ul>
        </div>
    </div>
@stop
