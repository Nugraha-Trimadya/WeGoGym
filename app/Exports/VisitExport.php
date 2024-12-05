<?php

namespace App\Exports;

use App\Models\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VisitExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visit::all();
    }
    
    public function headings(): array
    {
        return [
            'id',
            'name',
            'age',
            'gender',
            'time',
            'created_at',
            'updated_at',
        ];
    }

    public function map($visit): array
    {
        return [
            $visit->id,
            $visit->name,
            $visit->age,
            $visit->gender,
            $visit->time,
            $visit->created_at,
            $visit->updated_at,
        ];
    }
}
