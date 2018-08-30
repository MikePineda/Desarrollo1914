
@extends('layouts.base')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@if(Auth::check())
@section('content')
<br>
<br>
<br>
<br>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <input disabled value="{{$alumno->name}}" type="text" name="name" id="name" class="form-control input-sm" placeholder="Nombre">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <input  disabled value="{{$alumno->edad}}" type="number" name="edad" id="edad" class="form-control input-sm" placeholder="Tu edad">
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <input disabled value="{{$alumno->carrera}}" type="text" name="carrera" id="carrera" class="form-control input-sm" placeholder="Carrera">
    </div>
  </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <input disabled value="{{$alumno->updated_at}}" type="datetime" name="updated_at" id="updated_at" class="form-control input-sm" placeholder="Nombre">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <input disabled value="{{$alumno->created_at}}" type="datetime" name="created_at" id="created_at" class="form-control input-sm" placeholder="Nombre">
      </div>
    </div>

    <a class="btn btn-primary btn-lg" href="{{ route('alumno.index') }}" role="button">Regresar</a>

@endsection
@else
  <div class="jumbotron">
      <h1 class="display-4"> No tienes permiso </h1>

    <hr class="my-4">
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="http://localhost/lar/blog/login" role="button">Iniciar sesión</a>
    </p>
  </div>

@endif
