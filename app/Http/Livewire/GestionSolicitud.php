<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class GestionSolicitud extends Component
{
    public $estado='t';
    public $ver;
    public $solicitudActual;

    public function mount(){
        $this->ver=false;
    }
    public function render()
    {
        $response = Http::get('https://topicos-web.herokuapp.com/api/solicitudes', [
            'estado' => $this->estado,
        ]);
        return view('livewire.gestion-solicitud',['solicitudes'=>$response->json()])->layout('layouts.app',['header'=>'Solicitudes']);
    }

    public function obtenerSolicitud($id){
        $response = Http::get('https://topicos-web.herokuapp.com/api/solicitud/detalle', [
            'solicitud_id' => $id,
        ]);
        $this->ver=true;
        $this->solicitudActual=$response->json();
    }

}
