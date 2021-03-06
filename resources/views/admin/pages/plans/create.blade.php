@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active">Cadastrar</li>
    </ol>
    <h1>Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Cadastrar Novo Plano
        </div>
        <div class="card-body">
            <form action="{{route('plans.store')}}" method="post" class="form">
                @csrf

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
