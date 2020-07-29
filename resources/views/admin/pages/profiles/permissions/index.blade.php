@extends('adminlte::page')

@section('title', "Permissões do perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
        <li class="breadcrumb-item active">Permissões</li>
    </ol>

    <h1>
        Permissões do perfil: <b>{{$profile->name}}</b>
        <a href="{{route('profiles.permissions.available', $profile->id)}}" class="btn btn-dark btn-sm">
            <i class="fa fa-plus"></i> Adicionar
        </a>
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
                @forelse($permissions as $permission)
                    <tr>
                        <td class="align-middle">{{$permission->name}}</td>
                        <td class="align-middle">
                            <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}"
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
