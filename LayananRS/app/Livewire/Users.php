<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{

    public $welcome = "Welcome to the Users component!";

    // Menambahkan properti countUser
    public $countUser;

    // inisialisasi countUser di mount
    public function mount()
    {
        $this->countUser = User::all();
    }

    public function render()
    {
        return view('livewire.users');
    }
}
