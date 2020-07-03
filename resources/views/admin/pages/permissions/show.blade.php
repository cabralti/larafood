@extends('adminlte::page')

@section('title', "Detalhes da Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissões</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
    </ol>

    <h1>Permissão: <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Detalhes da Permissão
        </div>
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$permission->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('permissions.destroy', $permission->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{route('permissions.index')}}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@stop
