<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Publisher = Publisher::get();

        return view('Publisher.index', compact('Publisher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        publisher::create([             
            'name' => $request->name,         
            'addres' => $request->addres,             
            ]);     
    
            return to_route('Publisher');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Publisher = Publisher::get();

        return view('Publisher.edit',[
            'Publisher' => Publisher::find($id)], 
            compact('Publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Publisher = Publisher::find($id);

        $Publisher->update([
            'name' => $request->name,
            'addres' => $request->addres,        
        ]);
        
        return to_route('Publisher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Publisher = Publisher::find($id);

        $Publisher->delete();

        return to_route('Publisher');
    }
}
