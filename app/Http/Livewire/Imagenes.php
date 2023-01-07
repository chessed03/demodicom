<?php

namespace App\Http\Livewire;

use App\Models\Imagen;
use Livewire\Component;
use Livewire\WithFileUploads;

class Imagenes extends Component
{

    use WithFileUploads;


    protected $paginationTheme = 'bootstrap';
    protected $listeners       = ['destroy'];
    public $paginateNumber     = 5;
    public $orderBy            = 3;
    public $updateMode         = false;

    public $selected_id, $keyWord, $sucursal_id_search, $paciente_id, $url_imagen;

    public function render()
    {

        $sucursal_id_search = $this->sucursal_id_search;

        $keyWord            = '%'.$this->keyWord .'%';

        $paginateNumber     = $this->paginateNumber;

        $orderBy            = intval($this->orderBy);

        $sucursales         = Imagen::getDataSucursalesActives();

        $pacientes          = Imagen::getPacientesActives();

        $imagenes           = Imagen::getDataForImagenesView( $sucursal_id_search, $keyWord, $paginateNumber, $orderBy );

        return view('livewire.imagenes.view', [
            'imagenes'   => $imagenes,
            'pacientes'  => $pacientes,
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
        $this->emit('select2');
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
        $this->paciente_id = null;
        $this->url_imagen  = null;
    }

    public function store()
    {
        $this->validate([
            'paciente_id' => 'required',
            'url_imagen'  => 'image',
        ]);

        $uploadFile = $this->url_imagen->store('public');

        Imagen::create([
            'paciente_id'    => intval($this->paciente_id),
            'url_imagen'     => $uploadFile
        ]);

        $this->messageAlert('Éxito!', 'Imágen cargada.','success');

        $this->resetInput();
        $this->emit('closeCreateModal');
        $this->hydrate();

    }

}
