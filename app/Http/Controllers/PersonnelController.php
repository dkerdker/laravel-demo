<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\Http\Resources\PersonnelResource;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get personnel
        //$personnels = Personnel::all();
        $personnels = Personnel::select('id', 'name', 'email', 'details')->latest()->paginate(5);

        // return collection of personnels as a resource
        return PersonnelResource::collection($personnels);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personnel = new Personnel();
        $personnel->name = $request->name;
        $personnel->email = $request->email;
        $personnel->details = $request->details;

        if ($personnel->save()) {
            return new PersonnelResource($personnel);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personnel = Personnel::findOrFail($id);
        $personnel->name = $request->name;
        $personnel->email = $request->email;
        $personnel->details = $request->details;

        if ($personnel->save()) {
            return new PersonnelResource($personnel);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personnel = Personnel::findOrFail($id);

        if($personnel->delete()) {
            return new PersonnelResource($personnel);
        }
    }
}
