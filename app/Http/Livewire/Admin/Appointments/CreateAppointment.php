<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;

class CreateAppointment extends Component
{

    public $state = [];
    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointment', ['clients' => $clients]);
    }

    public function createAppointment()
    {
        dd($this->state);
    }
}
