@extends('adminlte::page')

@section('title', "Detalhes do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
    </ol>

    <h1>Perfil: <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Detalhes do Perfil
        </div>
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profile->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('profiles.destroy', $profile->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{route('profiles.index')}}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@stop
