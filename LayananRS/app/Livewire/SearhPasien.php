<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearhPasien extends Component
{

    // search pasien
    public $searchTerm = '';


    public function render()
    {
        // Mulai query dengan memfilter hanya pasien (role = 2)
        $query = User::where('role', '2');

        // Jika ada input pencarian, tambahkan kondisi where
        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->searchTerm . '%')
                         ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
            });
        }

        // Ambil data yang sudah difilter dan diurutkan, lalu kirim ke view
        $patients = $query->latest()->get();

        return view('livewire.searh-pasien', [
            'patients' => $patients,
        ]);
    }
}
