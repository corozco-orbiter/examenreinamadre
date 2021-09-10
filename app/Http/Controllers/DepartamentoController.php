<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;
class DepartamentoController extends Controller
{

    public function __construct()
    {
      $this->middleware('permission:ver-departamento | crear-departamento | editar-departamento | borrar-departamento',['only'=>['index']]);
      $this->middleware('permission:crear-departamento',['only'=>['create','store']]);
      $this->middleware('permission:editar-departamento',['only'=>['edit','update']]);
      $this->middleware('permission:borrar-departamento',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos= Departamentos::paginate(5);
        return view('departamentos.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre'=> 'required','descripcion'=> 'required']);
        Departamentos::create($request->all());
        return redirect()->route('departamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos=Departamentos::find($id);
        return view('departamentos.editar',compact('departamentos'));
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
        $this->validate($request,['nombre'=> 'required','descripcion'=> 'required']);
        Departamentos::update($request->all());
        return redirect()->route('departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departamentos::find($id)->delete();
        return redirect()->route('departamentos.index');
    }
}
