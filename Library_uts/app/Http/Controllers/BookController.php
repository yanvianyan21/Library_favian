<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        if($request){
            $Book = Book ::where('title', 'like', '%'.$request->cari.'%')->get();
            $Author = Author::where('name', 'like', '%'.$request->cari.'%')->get();
            }else{  
            $Book = Book::get();
            $Author = Author::get();
            }
            
            return view('Book.index', compact('Book', 'Author','request'));
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

        if($request->hasFile('cover')){
            $photoPath = $request->file('cover')->store();
        }

        Book::create([             
            'author_id' => $request->name,         
            'title' => $request->title,       
            'year' => $request->year, 
            'cover' => $photoPath,        
            ]);     
    
            return to_route('book');
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
        $Book = Book::get();
        $Author = Author::get();


        return view('Book.edit',[
            'Book' => Book::find($id)], 
            compact('Book', 'Author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Book = Book::find($id);

        $photoPath ='';

        if($request->hasFile('cover')){
            $photoPath = $request->file('cover')->store();
        }

        $Book->update([             
            'author_id' => $request->name,         
            'title' => $request->title,       
            'year' => $request->year, 
            'cover' => $photoPath,        
            ]);     
    
            return to_route('book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Book = Book::find($id);
        $Author = Author::find($id);

        $Book->delete();

        return to_route('book', $Author);
    }
}
