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
                            <h3 class="text-center">Departamentos</h3>
                            <a class="btn btn-info" href="{{route('departamentos.create')}}">Nuevo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection