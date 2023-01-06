@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @livewire('ver-imagenes', ['paciente_id' => $paciente_id])

            </div>
        </div>
    </div>
@endsection
