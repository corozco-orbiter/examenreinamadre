<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
class EmpresaController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:ver-empresa | crear-empresa | editar-empresa | borrar-empresa',['only'=>['index']]);
      $this->middleware('permission:crear-empresa',['only'=>['create','store']]);
      $this->middleware('permission:editar-empresa',['only'=>['edit','update']]);
      $this->middleware('permission:borrar-empresa',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas= Empresas::paginate(5);
        return view('empresas.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.crear');
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
        Empresas::create($request->all());
        return redirect()->route('empresas.index');
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
        $empresas=Empresas::find($id);
        return view('empresas.editar',compact('empresas'));
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
        $input = $request->all();
        $empresas = Empresas::find($id);
        $empresas->update($input);
        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresas::find($id)->delete();
        return redirect()->route('empresas.index');
    }
}
