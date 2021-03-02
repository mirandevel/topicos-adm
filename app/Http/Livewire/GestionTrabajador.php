<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class GestionTrabajador extends Component
{
    public $nombre='';
    public $estado='t';
    public $aceptar;
    public $rechazar;
    public $ver;
    public function mount(){
        $this->aceptar=false;
        $this->rechazar=false;
        $this->ver=false;
    }

    public function render()
    {
        $response = Http::get('https://topicos-web.herokuapp.com/api/trabajadores', [
            'estado' => $this->estado,
            'nombre' => $this->nombre,
        ]);
        return view('livewire.gestion-trabajador',['response'=>$response])->layout('layouts.app',['header'=>'Gestion de trabajadores']);
    }

    public function aceptar($id){
        $this->aceptar=false;
        $response = Http::post('https://topicos-web.herokuapp.com/api/trabajadores/aceptar', [
            'id' => $id,
        ]);
    }
    public function rechazar($id){
        $response = Http::post('https://topicos-web.herokuapp.com/api/trabajadores/rechazar', [
            'id' => $id,
        ]);
    }
}
