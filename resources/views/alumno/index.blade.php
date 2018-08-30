<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.base')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@if(Auth::check())
@section('content')
</br>
</br>

    <div class="jumbotron">
      @if(Auth::check())
        <h1 class="display-4"> Bienvenido tio {{ Auth::user()->email }} </h1>

     @else

       <h1 class="display-4"> Bienvenido tio invitado </h1>

      @endif
      <hr class="my-4">
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="{{ route('alumno.create') }}" role="button">Crear alumno</a>
      </p>
    </div>
<div class="container">
  <h2>Alumnos</h2>
    <table class="table" id="alumnosTable">
       <thead>
         <tr>
           <th>Nombre </th>
           <th>Edad</th>
           <th>Mayor de edad</th>
           <th>Carrera</th>
           <th>Acciones</th>

         </tr>
       </thead>
       <tbody>
         @foreach($alumnos as $alumno)
        <tr>
          <td>{{$alumno->name}} {{ $loop->index }}</td>
          <td>{{$alumno->edad}} </td>
          <td>
            @if($alumno->edad >= 18)
                  Si
            @else
                  No
            @endif

          </td>
          <td>
            @switch($alumno->carrera)
                @case("IDS")
                    Ingeniería en desarrollo de software
                    @break

                @case("II")
                    Ingeniería Industrial
                    @break

                @case("DS")
                    Diseño gráfico
                    @break

                @case("LAE")
                    Administración de empresas
                    @break

                @default
                    {{ $alumno->carrera }}
            @endswitch

           </td>
           <td>
             <a href="{{action('Alumno\AlumnoController@show', $alumno->id)}}">Ver</a>
             <a href="{{action('Alumno\AlumnoController@edit', $alumno->id)}}">Editar</a>
             <a data-toggle="modal" data-target="#exampleModal{{ $loop->index }}" href="#">Eliminar</a>

           </td>
        </tr>

        <!-- Modal -->
     <div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             ¿Seguro que deseas eliminar este registro?
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <form  action="{{ route('alumno.destroy', $alumno->id) }}" method="post" role="form" >
             <input name="_method" type="hidden" value="DELETE" />
             {{csrf_field()}}
             <button  type="submit" class="btn btn-primary">Eliminar</button>
           </form>
           </div>
         </div>
       </div>
     </div>
         @endforeach
       </tbody>
     </table>
     @if(count($alumnos) > 0)
       <p>Mostrando {{count($alumnos)}} registros.

     @else
      <p>No hay registros de alumnos</p>
     @endif
   </div>



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

@section('js')
    @parent
    <script>
    $(document).ready( function () {
    $('#alumnosTable').DataTable();
} );
    </script>
@endsection
