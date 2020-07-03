@extends('adminlte::page')

@section('title', "Editar Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    <h1>Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Editar Perfil: {{$profile->name}}
        </div>
        <div class="card-body">
            <form action="{{route('profiles.update', $profile->id)}}" method="post" class="form">
                @method('PUT')

                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
