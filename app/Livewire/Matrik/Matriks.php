<?php

namespace App\Livewire\Matrik;

use App\Exports\MatrikExportExcel;
use App\Exports\MatrikExportPdf;
use App\Models\Matrik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;

class Matriks extends Component
{
    #[Url()]
    public $search = '';

    public $matriks;
    public $perbulan;
    public $periode;


    public function render()
    {
        $role = Auth::user()->getRoleNames()->first();

        if ($role === 'admin') {
            $this->matriks = Matrik::periode()->cariMatrik($this->search)->get();
        } else {
            $this->matriks = Matrik::with('skpd')->userMatriks()->periode()->cariMatrik($this->search)->get();
        }

        return view('livewire.matrik.matriks', [
            'matriks' => $this->matriks,
        ]);
    }

    public function mount()
    {
        $role = Auth::user()->getRoleNames()->first();

        if ($role === 'admin') {
            $this->matriks = Matrik::periode()->get();
        } else {
            $this->matriks = Matrik::with('skpd')->userMatriks()->periode()->get();
        }
    }

    // public function downloadPdf()
    // {
    //     return Excel::download(new MatrikExportPdf($this->periode), 'matrik.pdf', \Maatwebsite\Excel\Excel::MPDF);
    // }

    public function downloadExcel()
    {
        $this->modal('excel')->close();
        return Excel::download(new MatrikExportExcel($this->periode, $this->perbulan), 'matrik.xlsx',);
    }
}
