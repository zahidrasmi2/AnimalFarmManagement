<?php

namespace App\Exports;

use App\Models\AnimalHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ActivityExports implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return AnimalHistory::select(
            'id',
            'animalID',
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
                'Activity ID',
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
                    $event->sheet->getStyle('A1:K1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                }
            ];
    }
}
