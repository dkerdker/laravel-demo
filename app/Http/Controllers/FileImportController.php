<?php

namespace App\Http\Controllers;

use App\Imports\FileImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileImportController extends Controller
{
    public function store(Request $request) {
        echo $request->file('formData');
        $file = $request->file('file')->store('import');

        $import = new FileImport;
        $import->import($file);

        dd($import->errors());
    }
}
