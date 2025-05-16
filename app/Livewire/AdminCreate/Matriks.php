<?php

namespace App\Livewire\AdminCreate;

use App\Models\Matrik;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class Matriks extends Component
{
    #[Url]
    public $search = '';

    public $matriks;

    public function render()
    {
        // dd($this->search);
        return view('livewire.admin-create.matriks');
    }

    public function mount()
    {
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $this->matriks = DB::table('matrik')
            ->whereMonth('created_at', $bulan)  // April
            ->whereYear('created_at', $tahun)
            ->get();
    }

    public function searching()
    {
        dd($this->search);
    }
}
