@extends('adminlte::page')

@section('title', "Detalhes do Plano: {$plan->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}" class="active">Detalhes</a>
        </li>
    </ol>

    <h1>
        Detalhes do Plano: {{$plan->name}} <a href="{{route('details.plan.create', $plan->url)}}" class="btn btn-dark btn-sm"><i
                class="fa fa-plus"></i> Adicionar</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($details as $detail)
                    <tr>
                        <td class="align-middle">{{$detail->name}}</td>
                        <td class="align-middle">
                            <a href="{{route('plans.edit', ['url' => $plan->url])}}"
                               class="btn btn-info btn-sm">Editar</a>
                            <a href="{{route('plans.show', ['url' => $plan->url])}}"
                               class="btn btn-warning btn-sm">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center bg-light py-3">Nenhum registro encontrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@stop
