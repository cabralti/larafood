@extends('adminlte::page')

@section('title', "Editar Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    <h1>Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Editar Plano: {{$plan->name}}
        </div>
        <div class="card-body">
            <form action="{{route('plans.update', $plan->url)}}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
