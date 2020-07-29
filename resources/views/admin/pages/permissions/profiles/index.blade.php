@extends('adminlte::page')

@section('title', "Perfis da permissão: {$permission->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissões</a></li>
        <li class="breadcrumb-item active">Perfis</li>
    </ol>

    <h1>
        Perfis que possuem a permissão: <b>{{$permission->name}}</b>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                @forelse($profiles as $profile)
                    <tr>
                        <td class="align-middle">{{$profile->name}}</td>
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
