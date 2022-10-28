<?php

namespace App\Imports;

use App\Models\CeleImportModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CeleCsvImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return  CeleImportModel::firstOrCreate(
            [
                'year'      => intval($row['year']),
                'rank'      => intval($row['rank']),
                'recipient' => $row['recipient'],
                'country'   => $row['country'],
                'career'    => $row['career'],
                'tied'      => intval($row['tied']),
                'title'     => $row['title'],
            ],
            [
                'year'      => intval($row['year']),
                'rank'      => intval($row['rank']),
                'recipient' => $row['recipient'],
                'country'   => $row['country'],
                'career'    => $row['career'],
                'tied'      => intval($row['tied']),
                'title'     => $row['title'],
            ],
            );
    }

    public function headingRow(): int
    {
        return 1;
    }


}
