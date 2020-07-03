@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Perfil</a></li>
        <li class="breadcrumb-item active">Cadastrar</li>
    </ol>
    <h1>Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Cadastrar Novo Perfil
        </div>
        <div class="card-body">
            <form action="{{route('profiles.store')}}" method="post" class="form">
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
