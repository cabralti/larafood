@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Permissões</li>
    </ol>

    <h1>
        Permissões <a href="{{route('permissions.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i>
            Adicionar</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('permissions.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Nome"
                       value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($permissions as $permission)
                    <tr>
                        <td class="align-middle">{{$permission->name}}</td>
                        <td class="align-middle">
                            <a href="{{route('permissions.edit', $permission->id)}}"
                               class="btn btn-info btn-sm">Editar</a>
                            <a href="{{route('permissions.show', $permission->id)}}"
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
