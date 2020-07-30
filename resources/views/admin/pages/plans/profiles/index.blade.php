@extends('adminlte::page')

@section('title', "Perfis do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active">Perfis</li>
    </ol>

    <h1>
        Perfis do plano: <b>{{$plan->name}}</b>
        <a href="{{route('plans.profiles.available', $plan->id)}}" class="btn btn-dark btn-sm">
            <i class="fa fa-plus"></i> Adicionar
        </a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($profiles as $profile)
                    <tr>
                        <td class="align-middle">{{$profile->name}}</td>
                        <td class="align-middle">
                            <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}"
                               class="btn btn-danger btn-sm"><i class="fa fa-unlink"></i> Desvincular</a>
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
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
