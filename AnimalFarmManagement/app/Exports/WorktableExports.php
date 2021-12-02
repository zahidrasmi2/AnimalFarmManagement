<?php

namespace App\Exports;

use App\Models\Worktable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Facades\Excel;

class WorktableExports implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    private $worktableRequest;

    public function headings(): array
    {
        return
            [
                'ID',
                'Date From',
                'Date Until',
                'Staff',
                'Animals Need To Check',
                'Details',
                'Created Date'
            ];
    }

    public function __construct($worktableRequest)
    {
        $this->worktableRequest = $worktableRequest;
    }


    public function map($worktableRequest): array
    {
        return [
            $worktableRequest->id,
            $worktableRequest->date_from,
            $worktableRequest->date_until,
            $worktableRequest->staff_id,
            $worktableRequest->animals,
            $worktableRequest->details,
            $worktableRequest->current_team_id,
            $worktableRequest->created_date,
        ];
    }

    public function collection()
    {
        return $this->worktableRequest;
        // return Worktable::where('current_team_id', auth()->user()->current_team_id)->get();
    }
}
