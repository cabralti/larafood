@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissões</a></li>
        <li class="breadcrumb-item active">Cadastrar</li>
    </ol>
    <h1>Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Cadastrar Nova Permissão
        </div>
        <div class="card-body">
            <form action="{{route('permissions.store')}}" method="post" class="form">
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
