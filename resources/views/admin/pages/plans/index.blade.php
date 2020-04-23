@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Listagem dos planos
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="50">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($plans as $plan)
                    <tr>
                        <td class="align-middle">{{$plan->name}}</td>
                        <td class="align-middle">R$ {{number_format($plan->price, 2, ',', '.')}}</td>
                        <td class="align-middle">
                            <a href="{{route('plans.show', ['url' => $plan->url])}}" class="btn btn-warning btn-sm">Ver</a>
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
            {!! $plans->links() !!}
        </div>
    </div>
@stop
