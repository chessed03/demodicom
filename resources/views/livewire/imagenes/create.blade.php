<!-- Modal -->
<div wire:ignore.self class="modal fade bs-create-data-modal" id="createModal" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createModalLabel">Agregar imágenes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true"><i class="fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <p class="sub-header">
                    *Campos requeridos.
                </p>
                <form>

                    <div class="form-group">
                        <label for="paciente_id_create">Paciente*</label>
                        <div wire:ignore>
                            <select wire:model="paciente_id" id="paciente_id_create" data-model="paciente_id" class="form-control select2">
                                <option value="" selected></option>
                                @foreach( $pacientes as $paciente )
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre . ' ' . $paciente->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('paciente_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label>Imágen</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" wire:model="url_imagen" id="url_imagen">
                                <label class="custom-file-label" for="url_imagen">Archivo</label>
                            </div>
                        </div>
                        @error('url_imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-danger btn-rounded waves-effect close-btn"><i class="bx bx-fw bxs-x-circle"></i> Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success btn-rounded waves-effect close-modal"><i class="bx bx-fw bxs-check-circle"></i> Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
