<?php

namespace App\Livewire\User;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaporanUser extends Component
{
    public $search = '';

    public function render()
    {
        $laporans = Laporan::query();

        if(Auth::user()->role == 'user') {
            $laporans->where('user_id', Auth::user()->id);
        }

        if(!empty($this->search)) {
            // $laporans->where('judul', 'like', '%' . $this->search . '%');
            $laporans->where(function ($query) {
                $query->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%'); 
            });
        }

        return view('livewire.user.laporan-user',[
            'laporans' => $laporans->get()
        ]);
    }
}
