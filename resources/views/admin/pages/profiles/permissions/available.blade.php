@extends('adminlte::page')

@section('title', "Permissões disponíveis perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
        <li class="breadcrumb-item active">Permissões</li>
    </ol>

    <h1>
        Permissões disponíveis perfil: <b>{{$profile->name}}</b>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="post" class="form form-inline">
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
                <form action="{{route('profiles.permissions.attach', $profile->id)}}" method="post">
                    @csrf
                    @forelse($permissions as $permission)
                        <tr>
                            <td width="50">
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                            </td>
                            <td class="align-middle">{{$permission->name}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center bg-light py-3">Nenhum registro encontrado.</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success">
                                Vincular
                            </button>
                        </td>
                    </tr>
                </form>
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
