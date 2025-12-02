<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public $welcome = 'Welcome to the Users component!';



    // membuat properti form create user
    public $name = '', $role = '', $email = '', $password = '';


    // membuat form user
    public function createUser()
    {

        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create($validatedData + [
            'password' => Hash::make($this->password),
        ]);

        $this->reset();

        session()->flash('status', 'User successfully created.');


    }

    // membuat properti pencarian
    public $searchTerm = '';



    public function render()
    {
        return view('livewire.users',[
            'countUser' => User::latest()->get(),
            'users' => User::where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('role', 'like', '%' . $this->searchTerm . '%')
                ->latest()
                ->get(),
        ]);
    }
}
