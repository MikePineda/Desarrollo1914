<!-- Stored in resources/views/child.blade.php -->

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
  <form method="POST" action="{{ route('alumno.store') }}"  role="form">
  							{{ csrf_field() }}
  							<div class="row">
  								<div class="col-xs-12 col-sm-12 col-md-12">
  									<div class="form-group">
  										<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Nombre">
  									</div>
  								</div>
  							</div>

  							<div class="row">
  								<div class="col-xs-6 col-sm-6 col-md-6">
  									<div class="form-group">
  										<input type="number" name="edad" id="edad" class="form-control input-sm" placeholder="Tu edad">
  									</div>
  								</div>
  								<div class="col-xs-6 col-sm-6 col-md-6">
  									<div class="form-group">
  										<input type="text" name="carrera" id="carrera" class="form-control input-sm" placeholder="Carrera">
  									</div>
  								</div>
  							</div>

  							<div class="row">
  								<div class="col-xs-12 col-sm-12 col-md-12">
  									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
  									<a href="{{ route('alumno.index') }}" class="btn btn-info btn-block" >Atrás</a>
  								</div>

  							</div>
				</form>





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
