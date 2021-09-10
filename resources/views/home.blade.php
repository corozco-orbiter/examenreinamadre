@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tablero</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">
                                    
                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                                                                        
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h5>Usuarios:{{$cant_usuarios}}</h5> 
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                                                                          
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h5>Roles:{{$cant_roles}}</h5> 
                                               
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                                                                         
                                                @php
                                                use App\Models\Empresas;
                                                 $cant_empresa = Empresas::count();                                                
                                                @endphp
                                                <h5>Empresas:{{$cant_empresa}}</h5>  
                                           
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                                                                         
                                                @php
                                                use App\Models\Departamentos;
                                                 $cant_departamento = Departamentos::count();                                                
                                                @endphp
                                                <h5>Departamentos:{{$cant_departamento}}</h5>  
                                           
                                            </div>
                                        </div>
                                    </div>                                                            
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                                                             
                                                @php
                                                 use App\Models\Empleados;
                                                $cant_empleados = Empleados::count();                                                
                                                @endphp
                                                <h5>Empleados:{{$cant_empleados}}</h5>  
                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>