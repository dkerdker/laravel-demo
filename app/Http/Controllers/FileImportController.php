<?php

namespace App\Http\Controllers;

use App\Imports\FileImport;
use Illuminate\Http\Request;

class FileImportController extends Controller
{
    public function store(Request $request) {
        $file = $request->file('file')->store('import');

        $import = new FileImport;
        $import->import($file);

        //dd($import->errors());
    }
}
