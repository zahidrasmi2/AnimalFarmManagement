<?php

namespace App\Exports;

use App\Models\Animals;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Facades\Excel;

class AnimalExports implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return Animals::select(
            'id',
            'tagNumber',
            'breed',
            'bornYear',
            'bornYear',
            'weight',
            'health',
            'comment',
            'status',
            'checkBy',
            'checkDate'
        )->where('current_team_id', auth()->user()->current_team_id)->get();
    }

    public function headings(): array
    {
        return
            [
                'Animal ID',
                'Tag Number',
                'Breed',
                'Born Year',
                'Weight',
                'Health',
                'Comment',
                'Status',
                'Check By',
                'Last Check'
            ];
    }

    public function registerEvents(): array
    {
        return
            [
                AfterSheet::class => function (AfterSheet $event) {
                    $event->sheet->getStyle('A1:J1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                }
            ];
    }
}
