<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Config;

class ListsExcelForList implements FromCollection, WithHeadings, ShouldAutoSize {
    use HasFactory;

    protected $headings;

    public function __construct(array $headings) {
        $this->headings = $headings;
    }

    public function Collection() {
        // id, 주소, 번호

        $select_data = DB::table('member_table')
            ->select('mb_id', 'address', 'mb_tell')
            ->get()
            ->toArray();

        return collect($select_data);
    }

    public function headings(): array {
        return $this->headings;
    }
}
