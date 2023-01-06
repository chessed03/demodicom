<!-- Modal -->
<div wire:ignore.self class="modal fade bs-create-data-modal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createModalLabel">Agregar paciente</h4>
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
                        <label for="nombre">Nombre*</label>
                        <input wire:model="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos*</label>
                        <input wire:model="apellidos" id="apellidos" type="text" class="form-control" placeholder="Apellidos">@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo*</label>
                        <input wire:model="correo" id="correo" type="text" class="form-control" placeholder="Correo">@error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-danger btn-rounded waves-effect close-btn" data-dismiss="modal"><i class="bx bx-fw bxs-x-circle"></i> Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success btn-rounded waves-effect close-modal"><i class="bx bx-fw bxs-check-circle"></i> Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
