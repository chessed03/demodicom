<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemounoController extends Controller
{

    public function index( Request $request )
    {
        return view('demouno.index');
    }

    public function sucursales( Request $request )
    {
        return view('demouno.sucursales.index');
    }

    public function pacientes( Request $request )
    {
        return view('demouno.pacientes.index');
    }

    public function expediente( Request $request )
    {
        return view('demouno.imagenes.index');
    }

    public function verImagenes( Request $request )
    {

        return view('demouno.imagenes.ver-imagenes', [
            'paciente_id' => $request->paciente_id
        ]);

    }

}
