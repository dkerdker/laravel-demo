<?php

namespace App\Http\Controllers;

use App\Personnel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->searchTerm;
        $searchIn = $request->searchIn;
        error_log($searchIn);

        // if ($searchIn != "") {
        //     $results = Personnel::where(function($query) use ($searchTerm, $searchIn){
        //         $query->where("$searchIn", 'LIKE', "%$searchTerm%");
        //     })->latest()->paginate(5);
        // } else {
        //     $results = Personnel::where(function($query) use ($searchTerm){
        //         $query->where('name', 'LIKE', "%$searchTerm%")->orWhere('email', 'LIKE', "%$searchTerm%")->orWhere('details', 'LIKE', "%$searchTerm%");
        //     })->latest()->paginate(5);
        // }

        if ($searchIn != "") {
            $results = Personnel::where("$searchIn", 'LIKE', "%$searchTerm%")->latest()->paginate(5);
        } else {
            $results = Personnel::where('name', 'LIKE', "%$searchTerm%")
            ->orWhere('email', 'LIKE', "%$searchTerm%")
            ->orWhere('details', 'LIKE', "%$searchTerm%")
            ->paginate(5);
        }

        return $results;
    }
}
