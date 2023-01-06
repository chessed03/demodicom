<?php

namespace App\Http\Livewire;

use App\Models\Imagen;
use Livewire\Component;
use Livewire\WithFileUploads;

class VerImagenes extends Component
{
    use WithFileUploads;

    protected $listeners  = ['destroy'];

    public $paciente_id, $url_imagen;

    public function mount( $paciente_id )
    {
        $this->paciente_id = $paciente_id;
    }

    public function render()
    {
        $paciente = Imagen::pacienteIdDatos($this->paciente_id);

        $imagenes = Imagen::pacienteIdImagenes($this->paciente_id);

        return view('livewire.imagenes.ver-imagenes',[
            'paciente' => $paciente,
            'imagenes' => $imagenes
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
        $this->emit('closeCreateModal');
        $this->hydrate();
    }

    private function resetInput()
    {

        $this->url_imagen = null;

    }

    public function store()
    {

        $this->validate([
            'url_imagen' => 'image',
        ]);

        $uploadFile = $this->url_imagen->store('public');

        Imagen::create([
            'paciente_id' => $this->paciente_id,
            'url_imagen'  => $uploadFile
        ]);

        $this->messageAlert('Éxito!', 'Imágen cargada.','success');

        $this->resetInput();
        $this->emit('closeCreateModal');
        $this->hydrate();

    }

    public function destroy( $id )
    {
        $record         = Imagen::where('id', $id)->first();
        $record->status = 0;
        $record->update();

        $this->messageAlert('Éxito!', 'Imágen eliminada.','success');
    }

}
