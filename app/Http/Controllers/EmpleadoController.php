<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Departamentos;
use App\Models\Empresas;

class EmpleadoController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:ver-empleado | crear-empleado | editar-empleado | borrar-empleado',['only'=>['index']]);
      $this->middleware('permission:crear-empleado',['only'=>['create','store']]);
      $this->middleware('permission:editar-empleado',['only'=>['edit','update']]);
      $this->middleware('permission:borrar-empleado',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados= Empleados::paginate(5);
      return view('empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos= Departamentos::pluck('nombre','nombre')->all();
        $empresas= Empresas::pluck('nombre','nombre')->all();
        return view('empleados.crear',compact('departamentos','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre'=> 'required','fecha_nacimiento'=> 'required','correo'=> 'required','genero'=> 'required','telefono'=> 'required','celular'=> 'required','fecha_ingreso'=> 'required']);
        Empleados::create($request->all());
        return redirect()->route('empleados.index');
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
        $empleado=Empleados::find($id);
        $empresas=Empresas::pluck('nombre','nombre')->all();
        $empleadoEmpresa=$empleado->empresas->pluck('nombre','nombre')->all();
        $departamentos=Departamentos::pluck('nombre','nombre')->all();
        $departamentoEmpresa=$empleado->departamentos->pluck('nombre','nombre')->all();
        return view('usuarios.editar',compact('empleado','empresas','departamentos','empleadoEmpresa','departamentoEmpresa'));
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
        $this->validate($request,['nombre'=> 'required','fecha_nacimiento'=> 'required','correo'=> 'required','genero'=> 'required','telefono'=> 'required','celular'=> 'required','fecha_ingreso'=> 'required']);
        Empleados::update($request->all());
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleados::find($id)->delete();
        return redirect()->route('empleados.index');
    }
}
