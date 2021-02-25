<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class GestionTrabajador extends Component
{
    public $nombre;
    public $estado;
    public function render()
    {
        $response = Http::get('https://topicos-web.herokuapp.com/api/trabajadores', [
            'nombre' => $this->nombre,
            'estado' => $this->estado,
        ]);
        return view('livewire.gestion-trabajador',['response'=>$response])->layout('layouts.app',['header'=>'Gestion de trabajadores']);
    }
    public function aceptar($id){
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
