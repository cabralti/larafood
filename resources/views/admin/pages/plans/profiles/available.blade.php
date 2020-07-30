@extends('adminlte::page')

@section('title', "Perfis disponíveis, plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles', $plan->id)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active">Perfis</li>
    </ol>

    <h1>
        Perfis disponíveis, plano: <b>{{$plan->name}}</b>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.profiles.available', $plan->id)}}" method="post"
                  class="form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Nome"
                       value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{route('plans.profiles.attach', $plan->id)}}" method="post">
                    @csrf
                    @forelse($profiles as $profile)
                        <tr>
                            <td width="50">
                                <input type="checkbox" name="profiles[]" value="{{$profile->id}}">
                            </td>
                            <td class="align-middle">{{$profile->name}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center bg-light py-3">Nenhum registro encontrado.</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-link"></i> Vincular
                            </button>
                        </td>
                    </tr>
                </form>
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
