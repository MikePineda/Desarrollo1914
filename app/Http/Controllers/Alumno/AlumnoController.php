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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumno.create');
    }


     public function show($id)
     {
         //
         $alumno = Alumno::find($id);
         return view('alumno.view' ,  ['alumno' => $alumno ]);
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'name'=>'required', 'edad'=>'required', 'carrera'=>'required']);
        Alumno::create($request->all());
        return redirect()->route('alumno.index')->with('success','Registro creado satisfactoriamente');
    }
    /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         //
         $alumno = Alumno::find($id);
         return view('alumno.edit' ,  ['alumno' => $alumno ]);
     }




     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        //$this->validate($request,[ 'name'=>'required', 'edad'=>'required', 'carrera'=>'required']);
        Alumno::find($id)->update($request->all());
        return redirect()->route('alumno.index')->with('success','Registro actualizado satisfactoriamente');

    }

     /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          //
           Alumno::find($id)->delete();
          return redirect()->route('alumno.index')->with('success','Registro eliminado satisfactoriamente');
      }
}
