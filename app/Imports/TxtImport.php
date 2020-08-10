<?php

namespace App\Imports;

use App\Personnel;
use Maatwebsite\Excel\Concerns\ToModel;

class TxtImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $noRecords = Personnel::where('email', '=', $row['email'])->get()->isEmpty();
        if ($noRecords) {
            return new Personnel([
                'name' => $row['name'],
                'email' => $row['email'],
                'details' => $row['details'],
            ]);
        }
    }
}
