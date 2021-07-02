@extends('layouts.master')

@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <table class="table table-hover table-bordered table-striped table-responsive">
                <thead class="bg-info">
                    <td>Nombre</td>
                    <td>Marca</td>
                    <td>Año lanzamiento</td>
                    <td>Acciones</td>
                </thead>
                <tbody id="tbody-consola"></tbody>
            </table>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/servicios/consolasService.js')}}"></script>
    <script src="{{asset('js/ver_consolas.js')}}"></script>
@endsection