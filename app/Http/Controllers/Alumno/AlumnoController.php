<?php

namespace App\Http\Controllers\Alumno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;

class AlumnoController extends Controller
{
    public function index(Request $request){
      $nombre = $request->query('name', 'Invitado');
      $alumnos  = Alumno::all();
      return view("alumno.index", ['name' => $nombre , 'alumnos' => $alumnos]);
    }
}
