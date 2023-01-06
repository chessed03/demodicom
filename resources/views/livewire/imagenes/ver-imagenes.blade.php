@section('title', __('Customers'))

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Demo</a></li>
                        <li class="breadcrumb-item">Paciente</li>
                        <li class="breadcrumb-item active">Imágenes</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $paciente->nombre . ' '. $paciente->apellidos }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">

        <div class="col-12">

            <div class="card-box">

                <div class="row justify-content-between">
                    <h4 class="header-title mb-3">Lista de imágenes</h4>

                    <button type="button" class="btn btn-success btn-rounded waves-effect" data-toggle="modal" data-target="#createModal"><i class="bx bx-fw bxs-plus-circle bx-xs"></i> Agregar imagen </button>
                </div>

                @include('livewire.imagenes.create-ver-imagenes')

                <div class="row pt-3">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary waves-effect waves-light" type="button"><i class="bx bx-fw bx-search-alt bx-xs"></i> Búsqueda</button>
                            </div>
                            <input type="text" wire:model='keyWord' name="search" id="search" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary waves-effect waves-light" type="button"><i class="bx bx-fw bx-list-ol bx-xs"></i> Ordenar</button>
                            </div>
                            <select wire:model='orderBy' name="orderBy" id="orderBy" class="form-control">
                                <option value="1">De A a la Z</option>
                                <option value="2">De Z a la A</option>
                                <option value="3">Más recientes primero</option>
                                <option value="4">Más antiguos primero</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary waves-effect waves-light" type="button"><i class="bx bx-fw bx-poll bx-xs"></i> Mostrando</button>
                            </div>
                            <select wire:model='paginateNumber' id="paginateNumber" name="paginateNumber" class="form-control">
                                <option value="5" selected>&nbsp;&nbsp;5 Registros</option>
                                <option value="10">&nbsp;10 Registros</option>
                                <option value="25">&nbsp;25 Registros</option>
                                <option value="50">&nbsp;50 Registros</option>
                                <option value="100">100 Registros</option>
                            </select>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">

                @foreach($imagenes as $row)
                    <div class="col-lg-6 col-xl-3">
                        <!-- Simple card -->
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ asset('storage/' . (explode('/', $row->url_imagen))[1]) }}" alt="Card image cap">
                            <div class="card-body">

                                <a href="#" class="btn btn-danger btn-rounded waves-effect" onclick="destroy('{{ $row->id }}')"><i class="bx bx-fw bxs-x-circle"></i>  Eliminar</a>

                            </div>
                        </div>
                    </div><!-- end col -->
                @endforeach

            </div>

        </div>

    </div>

</div>

@push('js')

    <script>

        const destroy = ( id ) => {

            const swalWithBootstrapButtons = Swal.mixin({

                customClass: {
                    confirmButton: 'btn btn-success btn-rounded waves-effect ml-3',
                    cancelButton: 'btn btn-danger btn-rounded waves-effect mr-3'
                },

                buttonsStyling: false

            });

            swalWithBootstrapButtons.fire({
                title:"Estás apunto de eliminar un registro",
                text:"El registro ya no será visible",
                type:"warning",
                showCancelButton: true,
                confirmButtonText:"<i class='bx bx-fw bxs-check-circle'></i> Aceptar",
                cancelButtonText: "<i class='bx bx-fw bxs-x-circle'></i> Cancelar",
                reverseButtons: true
            }).then(function(option){

                if ( option.value ) {

                    window.livewire.emit('destroy', id);

                }

            })

        }

    </script>

@endpush
