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

        $datos['restaurantes']=Restaurante::paginate(15);
        return view('listarRestaurantes', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view("administrarRestaurantes");
        //lista de restaurantes para el crud
        $datos['restaurantes']=Restaurante::paginate(5);
        return view("administrarRestaurantes", $datos);

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
        return redirect("restaurantes/create");



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $datos['restaurantes']=Restaurante::paginate(15);
        return view("listarRestaurantes", $datos);

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

        $restaurante= Restaurante::findOrFail($id);

        return view('editar',compact('restaurante'));
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
        $datosRestaurante=request()->except(['_token', '_method']);
        Restaurante::where('id', '=', $id)->update($datosRestaurante);

        $restaurante = Restaurante::findOrFail($id);
        return view('editar', compact('restaurante'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurante::destroy($id);

        return redirect('restaurantes/create');
    }
}
