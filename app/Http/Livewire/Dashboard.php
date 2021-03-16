<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        $response = Http::get('https://topicos-web.herokuapp.com/api/dashboard', []);
        return view('livewire.dashboard',
        ['usuarios'=>$response->json()['usuarios'],
        'solicitudes'=>$response->json()['solicitudes']]);
    }
}
