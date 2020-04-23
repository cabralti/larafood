@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
    </ol>

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

            <form action="{{route('plans.destroy', ['id' => $plan->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@stop
