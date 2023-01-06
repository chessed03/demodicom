<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paciente;

class Pacientes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners       = ['destroy'];
    public $paginateNumber     = 5;
    public $orderBy            = 3;
    public $updateMode         = false;
    public $selected_id, $keyWord, $nombre, $apellidos, $correo;

    public function render()
    {

        $keyWord        = '%'.$this->keyWord .'%';

        $paginateNumber = $this->paginateNumber;

        $orderBy        = intval($this->orderBy);

        $pacientes     = Paciente::getDataForPacientesView( $keyWord, $paginateNumber, $orderBy );

        if ( $paginateNumber > count($pacientes) ) {

            $this->resetPage();

        }

        return view('livewire.pacientes.view', [
            'pacientes' => $pacientes
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
        $this->apellidos = null;
        $this->correo    = null;

    }

    public function store()
    {
        $this->validate([
            'nombre'    => 'required',
            'apellidos' => 'required',
            'correo'    => 'required',
        ]);

        $validateNewPacienteNoRepeat = Paciente::validateNewPacienteNoRepeat( null, $this->correo );

        if ( $validateNewPacienteNoRepeat ) {

            Paciente::create([
                'nombre'    => $this->nombre,
                'apellidos' => $this->apellidos,
                'correo'    => $this->correo
            ]);

            $this->messageAlert('Éxito!', 'Paciente creado.','success');

        } else {

            $this->messageAlert('Error!', 'Ya existe un paciente con el nombre ingresado.','error');

        }

        $this->resetInput();
        $this->emit('closeCreateModal');
        $this->hydrate();
    }

    public function edit($id)
    {
        $record             = Paciente::findOrFail($id);

        $this->selected_id  = $id;

        $this->nombre       = $record->nombre;
        $this->apellidos    = $record->apellidos;
        $this->correo       = $record->correo;

        $this->updateMode   = true;
    }

    public function update()
    {
        $this->validate([
            'nombre'    => 'required',
            'apellidos' => 'required',
            'correo'    => 'required',
        ]);

        if ($this->selected_id) {

            $validateNewPacienteNoRepeat = Paciente::validateNewPacienteNoRepeat( $this->selected_id, $this->correo );

            if ( $validateNewPacienteNoRepeat ) {

                $record = Paciente::find($this->selected_id);

                $record->update([
                    'nombre'    => $this->nombre,
                    'apellidos' => $this->apellidos,
                    'correo'    => $this->correo
                ]);

                $this->messageAlert('Éxito!', 'Paciente actualizado.','success');

            } else {

                $this->messageAlert('Error!', 'Ya existe un paciente con el correo ingresado.','error');

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

            $validatePacienteActiveOnSites = Paciente::validatePacienteActiveOnSites( $id );

            if( $validatePacienteActiveOnSites ) {

                $this->messageAlert('Error!', 'El cliente está activo en imágenes.','error');

            } else {

                $record         = Paciente::where('id', $id)->first();
                $record->status = 0;
                $record->update();

                $this->messageAlert('Éxito!', 'Paciente eliminado.','success');

            }

        }
    }

}
