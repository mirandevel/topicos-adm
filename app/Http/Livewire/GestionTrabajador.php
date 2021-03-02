<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class GestionTrabajador extends Component
{
    public $nombre='';
    public $estado='t';
    public $aceptar;
    public $rechazar;
    public $ver;
    public $userId;
    public $currentuser;
    public $email;
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

    public function setId($id,$opcion){
        $this->userId=$id;
        $response = Http::get('https://topicos-web.herokuapp.com/api/trabajadores/detalle', [
            'id' => $id,
        ]);
        $this->currentuser=$response->json();

        if($opcion==1){
            $this->aceptar=true;
        }
        if($opcion==2){
            $this->rechazar=true;
        }
        if($opcion==3){
            $this->ver=true;
        }
    }
    public function aceptar(){
        $this->aceptar=false;
        $response = Http::post('https://topicos-web.herokuapp.com/api/trabajadores/aceptar', [
            'id' => $this->userId,
            'email'=>$this->currentuser['email'],
        ]);
    }
    public function rechazar(){
        $this->rechazar=false;
        $response = Http::post('https://topicos-web.herokuapp.com/api/trabajadores/rechazar', [
            'id' => $this->userId,
            'email'=>$this->currentuser['email'],
        ]);
    }
}
