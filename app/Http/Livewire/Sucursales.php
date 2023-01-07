<?php

namespace App\Http\Livewire;

use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class Sucursales extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners       = ['destroy'];
    public $paginateNumber     = 5;
    public $orderBy            = 3;
    public $updateMode         = false;
    public $selected_id, $keyWord, $nombre, $direccion;

    public function render()
    {

        $keyWord        = '%'.$this->keyWord .'%';

        $paginateNumber = $this->paginateNumber;

        $orderBy        = intval($this->orderBy);

        $sucursales     = Sucursal::getDataForSucursalesView( $keyWord, $paginateNumber, $orderBy );

        if ( $paginateNumber > count($sucursales) ) {

            $this->resetPage();

        }

        return view('livewire.sucursales.view', [
            'sucursales' => $sucursales
        ]);
    }

    public function messageAlert( $heading, $text, $icon )
    {

        $this->emit('message', $heading, $text, $icon);

    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
        $this->emit('closeCreateModal');
        $this->emit('closeUpdateModal');
        $this->hydrate();
    }

    private function resetInput()
    {

        $this->nombre    = null;
        $this->direccion = null;

    }

    public function store()
    {
        $this->validate([
            'nombre'    => 'required',
            'direccion' => 'required'
        ]);

        $validateNewSucursalNoRepeat = Sucursal::validateNewSucursalNoRepeat( null, $this->nombre );

        if ( $validateNewSucursalNoRepeat ) {

            Sucursal::create([
                'nombre'    => $this->nombre,
                'direccion' => $this->direccion
            ]);

            $this->messageAlert('Éxito!', 'Sucursal creado.','success');

        } else {

            $this->messageAlert('Error!', 'Ya existe una sucursal con el nombre ingresado.','error');

        }

        $this->resetInput();
        $this->emit('closeCreateModal');
        $this->hydrate();
    }

    public function edit($id)
    {
        $record             = Sucursal::findOrFail($id);

        $this->selected_id  = $id;

        $this->nombre       = $record->nombre;
        $this->direccion    = $record->direccion;

        $this->updateMode   = true;
    }

    public function update()
    {
        $this->validate([
            'nombre'    => 'required',
            'direccion' => 'required'
        ]);

        if ($this->selected_id) {

            $validateNewSucursalNoRepeat = Sucursal::validateNewSucursalNoRepeat( $this->selected_id, $this->nombre );

            if ( $validateNewSucursalNoRepeat ) {

                $record = Sucursal::find($this->selected_id);

                $record->update([
                    'nombre'    => $this->nombre,
                    'direccion' => $this->direccion
                ]);

                $this->messageAlert('Éxito!', 'Sucursal actualizado.','success');

            } else {

                $this->messageAlert('Error!', 'Ya existe una sucursal con el correo ingresado.','error');

            }

            $this->resetInput();
            $this->emit('closeUpdateModal');
            $this->updateMode = false;
            $this->hydrate();

        }
    }

    public function destroy($id)
    {
        if ($id) {

            $validateSucursalActiveOnPacientes = Sucursal::validateSucursalActiveOnPacientes( $id );

            if( $validateSucursalActiveOnPacientes ) {

                $this->messageAlert('Error!', 'El sucursal está activo en pacientes.','error');

            } else {

                $record         = Sucursal::where('id', $id)->first();
                $record->status = 0;
                $record->update();

                $this->messageAlert('Éxito!', 'Sucursal eliminado.','success');

            }

        }
    }

}
