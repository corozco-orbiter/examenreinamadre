@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Usuarios</h3>
                            <a class="btn btn-info" href="{{route('usuarios.create')}}">Nuevo</a>
                            <table class="table table-striped mt-2">
                                <thead>
                                    <th style="display:none">ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </thead>
                                 <tbody>
                                     @foreach($usuarios as $usuario)
                                     <tr>
                                         <td style="display:none">{{$usuario->id}}</td>
                                         <td >{{$usuario->name}}</td>
                                         <td >{{$usuario->email}}</td>
                                         <td >@if(!empty($usuario->getRoleNames()))

                                         @foreach($usuario->getRoleNames() as $rolName)
                                          <span>{{$rolName}}</span>
                                         @endforeach

                                         @endif
                                         </td>
                                         <td>
                                             <a class="btn btn-info" href="{{route('usuarios.edit',$usuario->id)}}"></a>
                                         </td>
                                        
                                     </tr>
                                     @endforeach
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
