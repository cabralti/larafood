@extends('adminlte::page')

@section('title', "Visualizar detalhe: {$detail->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}" class="active">Detalhes</a>
        <li class="breadcrumb-item"><a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}" class="active">Visualizar
                dados</a>
        </li>
    </ol>

    <h1>
        Visualizar detalhe: {{$detail->name}}
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$detail->name}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('details.plan.destroy', [$plan->url, $detail->id])}}" method="post">
                @method('DELETE')
                @csrf

                <a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Voltar
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Deletar o detalhe: <b>{{$detail->name}}</b> do plano: {{$plan->name}}
                </button>
            </form>
        </div>
    </div>
@stop
