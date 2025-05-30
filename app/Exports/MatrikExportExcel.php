<?php

namespace App\Exports;

use App\Models\Matrik;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Pest\Concerns\Expectable;

class MatrikExportExcel implements FromView, ShouldAutoSize
{
    use Expectable;

    public $periode;
    public $perbulan;

    public function __construct($periode, $perbulan)
    {
        $this->periode = $periode;
        $this->perbulan = intval($perbulan);
    }

    public function view(): View
    {
        $role = Auth::user()->getRoleNames()->first();

        $start = Carbon::parse($this->periode)->startOfMonth();
        $end = $start->copy()->addMonths(-$this->perbulan + 1)->endOfMonth()->locale('id')->translatedFormat('Y-m');

        if ($role === 'admin') {
            $matriks = Matrik::with('skpd')
                ->periode()
                ->whereBetween('periode', [$end, $this->periode])
                ->get();
        } else {
            $matriks = Matrik::with('skpd')
                ->userMatriks()
                ->periode()
                ->whereBetween('periode', [$end, $this->periode])
                ->get();
        }

        return view('export-excel.matrik', [
            'matriks' => $matriks
        ]);
    }
}
