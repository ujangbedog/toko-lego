<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Datatables;

class AjaxCRUDImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Book::select('*'))
            ->addColumn('action', 'book-action')
            ->addColumn('image', 'show-image')
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('book-list');
    }
     
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $bookId = $request->id;
        if($bookId){
             
            $book = Book::find($bookId);
            if($request->hasFile('image')){
                $path = $request->file('image')->store('public/images');
                $book->image = $path;
            }   
         }else{
                $path = $request->file('image')->store('public/images');
               $book = new Book;
               $book->image = $path;
         }
         
        $book->title = $request->title;
        $book->code = $request->code;
        $book->author = $request->author;
        $book->save();
     
        return Response()->json($book);
    }
     
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $book  = Book::where($where)->first();
     
        return Response()->json($book);
    }
     
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::where('id',$request->id)->delete();
     
        return Response()->json($book);
    }
}
