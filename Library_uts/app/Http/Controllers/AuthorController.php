<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Author = Author::get();

        return view('Author.index', compact('Author'));
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
        $photoPath ='';

        if($request->hasFile('foto')){
            $photoPath = $request->file('foto')->store();
        }

        author::create([             
            'name' => $request->name,         
            'photo' => $photoPath,             
            ]);     
    
            return to_route('Author');
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
        $Author = Author::get();

        return view('Author.edit',[
            'Author' => Author::find($id)], 
            compact('Author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Author = Author::find($id);

        $photoPath ='';

        if($request->hasFile('foto')){
            $photoPath = $request->file('foto')->store();
        }

        $Author->update([             
            'name' => $request->name,         
            'photo' => $photoPath,             
            ]);     
    
            return to_route('Author');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Author = Author::find($id);

        $Author->delete();

        return to_route('Author');
    }
}
