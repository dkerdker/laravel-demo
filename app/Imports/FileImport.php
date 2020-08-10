<?php

namespace App\Imports;

use App\Personnel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Throwable;

class FileImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $noRecords = Personnel::where('email', '=', $row['email'])->get()->isEmpty();
        // if ($noRecords) {
            return new Personnel([
                'name' => $row['name'],
                'email' => $row['email'],
                'details' => $row['details'],
            ]);
        // }
    }

    public function rules(): array {
        return [
            'email' => 'unique:Personnel,email'
        ];
    }

    public function customValidationMessages() {
        return [
            'email.unique' => 'Email is not unique.'
        ];
    }
}
