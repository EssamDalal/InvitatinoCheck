<?php

namespace App\Exports;

use App\Models\Registered;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegisteredsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Registered::select("id", "name", "email", "position", "jeha", "phone", "questions", "come", "site_number", "created_at")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name", "Email", "Position", "Jeha", "Phone", "Questions", "Come", "SiteNumber", "CreatedAt"];
    }
}
