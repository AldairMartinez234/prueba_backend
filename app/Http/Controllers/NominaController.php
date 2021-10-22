<?php

namespace App\Http\Controllers;

use App\Http\Requests\NominaRequest;
use App\Models\Nomina;
use Illuminate\Http\Request;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nominas = Nomina::all();
        return response()->json($nominas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NominaRequest $request)
    {
        $nominas = Nomina::create($request->validated());
        return response()->json([
            'message'=>'Empleado agregado con exito',
            'nominas'=>$nominas
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function show(Nomina $nomina)
    {
        return response()->json($nomina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function edit(Nomina $nomina)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function update(NominaRequest $request, Nomina $nomina)
    {
        $nomina->fill($request->validated())->save();
        return response()->json([
            'message'=>'Empleado actualizado',
            'nominas'=>$nomina
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomina $nomina)
    {
        $nomina->delete();
        return response()->json([
            'message'=>'Empleado eliminado'
        ]);
    }
}
