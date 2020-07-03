@extends('adminlte::page')

@section('title', "Editar Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissões</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    <h1>Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Editar Permissão: {{$permission->name}}
        </div>
        <div class="card-body">
            <form action="{{route('permissions.update', $permission->id)}}" method="post" class="form">
                @method('PUT')

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
