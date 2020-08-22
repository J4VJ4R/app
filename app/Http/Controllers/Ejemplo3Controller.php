<?php

namespace App\Http\Controllers;

use App\Restaurante;
use CreateRestaurantesTable;
use Illuminate\Http\Request;

class Ejemplo3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("listarReservas");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("administrarRestaurantes");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$datosRestaurantes=request()->all();

        $datosRestaurante=request()->except('_token');
        if($request->hasFile('urlfoto')){
            $datosRestaurante['urlfoto']=$request->file('urlfoto')->store('uploads','public');
        }
        Restaurante::insert($datosRestaurante);
        //return response()->json($datosRestaurante);
        return view("administrarRestaurantes");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("listarRestaurantes");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        return "estas en edit y recibimos el parámetro ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

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
    }
}
