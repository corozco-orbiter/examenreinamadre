@extends('layouts.app')
@section('title')
  Empresas
@endsection
@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Empresas</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">                           
                          <a class="btn btn-warning" href="{{ route('empresas.create') }}">Nuevo</a>        
                         
                            <table class="table table-striped mt-2">
                              <thead style="background-color:#6777ef">                                     
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">Descripcion</th>   
                                  <th style="color:#fff;">Acciones</th>                                                               
                              </thead>
                              <tbody>
                                @foreach ($empresas as $empresa)
                                  <tr>
                                    <td style="display: none;">{{ $empresa->id }}</td>
                                    <td>{{ $empresa->nombre }}</td>
                                    <td>{{ $empresa->descripcion }}</td>

                                    <td>                                  
                                      <a class="btn btn-info" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a>

                                      {!! Form::open(['method' => 'DELETE','route' => ['empresas.destroy', $empresa->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $empresas->links() !!}
                          </div>     
                            
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>