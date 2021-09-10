@extends('layouts.app')
@section('title')
  Empleados
@endsection
@section('content')


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">


<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Empleados</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">                           
                          <a class="btn btn-warning" href="{{ route('empleados.create') }}">Nuevo</a>        
                         <br>
                         <br>
                            <table id="empleados" class="table table-striped mt-2">
                              <thead style="background-color:#6777ef">  
                              <tr>                                  
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Empresa</th>
                                  <th style="color:#fff;">Departamento</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">Fecha de nacimiento</th>   
                                  <th style="color:#fff;">Correo</th> 
                                  <th style="color:#fff;">Genero</th> 
                                  <th style="color:#fff;">Telefono</th> 
                                  <th style="color:#fff;">Celular</th> 
                                  <th style="color:#fff;">Fecha de ingreso</th> 
                                  <th style="color:#fff;">Acciones</th>   
                                  </tr>                                                             
                              </thead>
                              <tbody>
                                @foreach ($empleados as $empleado)
                                  <tr>
                                    <td style="display: none;">{{ $empleado->id }}</td>
                                    <td>{{ $empleado->empresa }}</td>
                                    <td>{{ $empleado->departamento }}</td>
                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->fecha_nacimiento }}</td>
                                    <td>{{ $empleado->correo }}</td>
                                    <td>{{ $empleado->genero }}</td>
                                    <td>{{ $empleado->telefono }}</td>
                                    <td>{{ $empleado->celular }}</td>
                                    <td>{{ $empleado->fecha_ingreso }}</td>

                                    <td>                                  
                                      <a class="btn btn-info" href="{{ route('empleados.edit',$empleado->id) }}">Editar</a>

                                      {!! Form::open(['method' => 'DELETE','route' => ['empleados.destroy', $empleado->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $empleados->links() !!}
                          </div>     
                            
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
<!--Import jQuery before export.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


<!--Data Table-->
<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

<!--Export table buttons-->
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
<script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

    <script>
var idioma=

{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Ãšltimo",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copyTitle": 'Informacion copiada',
        "copyKeys": 'Use your keyboard or menu to select the copy command',
        "copySuccess": {
            "_": '%d filas copiadas al portapapeles',
            "1": '1 fila copiada al portapapeles'
        },

        "pageLength": {
        "_": "Mostrar %d filas",
        "-1": "Mostrar Todo"
        }
    }
};
$(document).ready(function() {
  
  
    $('#empleados').DataTable({
        "responsive": false,
        "language": idioma,
        "paging": false,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });

  
} );
    </script>
@endsection
