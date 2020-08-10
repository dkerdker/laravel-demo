<?php

namespace App\Http\Controllers;

use App\Imports\FileImport;
use App\Imports\TxtImport;
use Illuminate\Http\Request;

class FileImportController extends Controller
{
    
    public function store(Request $request) {
        $file = $request->file('file')->store('import');

        $import = new FileImport;
        $import->import($file);

        //dd($import->errors());
    }

    // public function storeTxt(Request $request) {
    //     $file = $request->file('file');

    //     $lines = file($file, FILE_IGNORE_NEW_LINES);
    //     $arrays = array_map(function($array) {
    //         $columns = ['name', 'email', 'details'];
    //         return array_combine($columns, array_map('trim', $array));
    //     }, array_chunk($lines, 3));

    //     $arrays->store('import');
    //     $import = new TxtImport;
    //     $import->import($arrays);
    // }
}
