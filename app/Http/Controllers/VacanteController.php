<?php

namespace App\Http\Controllers;

use App\Models\salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\experiencia;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        //Revisar que el usuario este autenticado y verificado
        $this->middleware(['auth','verified']);
    }



    public function index()
    {
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consultas,llamo al model y traigo todos los datos de la db.

        $categorias = Categoria::all();
        $experiencias = experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = salario::all();
        return view('vacantes.create')
                ->with('categorias',$categorias)
                ->with('experiencias',$experiencias)
                ->with('ubicaciones',$ubicaciones)
                ->with('salarios',$salarios);
     
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
    }

    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time().'.'.$imagen->extension();
        $imagen->move(public_path('storage/vacantes'),$nombreImagen);
        return response()->json(['correcto'=>$nombreImagen]);
    }
}
