<?php

namespace App\Exports;

use App\Models\Matrik;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MatrikExportPdf implements ShouldAutoSize, WithStyles, WithEvents, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $periodeAwal;

    public function __construct($periodeAwal, $periodeAkhir)
    {
        $this->periodeAwal = intval($periodeAwal);
        $this->periodeAkhir = intval($periodeAkhir);
    }

    public function styles(Worksheet $sheet)
    {

        return [
            // Style untuk header
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => 'solid', 'color' => ['rgb' => '000000']],
                'alignment' => ['horizontal' => 'center']
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastRow = $event->sheet->getHighestRow();
                $lastColumn = $event->sheet->getHighestColumn();
                $range = 'A1:' . $lastColumn . $lastRow;

                // Set landscape orientation
                $event->sheet->getDelegate()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }

    public function view(): View
    {
        $role = Auth::user()->getRoleNames()->first();

        if ($role === 'admin') {
            $matriks = Matrik::periode()->get();
        } else {
            $matriks = Matrik::with('skpd')->userMatriks()->periode()->get();
        }

        return view('export-pdf.matrik', [
            'matriks' => $matriks
        ]);
    }
}
