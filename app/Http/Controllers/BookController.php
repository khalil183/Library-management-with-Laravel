<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Image;
use Str;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('book.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category'=>'required',
            'name'=>'required',
            'author'=>'required',
            'publication'=>'required',
            'purchase_date'=>'required',
            'price'=>'required',
            'qty'=>'required',
            'image'=>'required',
        ]);

        $image=$request->file('image');
        $ext=$image->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
                $path='public/books/';
                $upload_path=$path.$name;
                $up=Image::make($image)
                        ->resize(150,150)
                        ->save($upload_path);
        Book::create([
            'category_id'=>$request->category,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'author'=>$request->author,
            'publication'=>$request->publication,
            'purchase_date'=>$request->purchase_date,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'image'=>$upload_path
        ]);

        $notification=array(
            'messege'=>'Created SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('book.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories=Category::all();
        return view('book.edit',compact('categories','book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'category'=>'required',
            'name'=>'required',
            'author'=>'required',
            'publication'=>'required',
            'purchase_date'=>'required',
            'price'=>'required',
            'qty'=>'required',
        ]);

        $image=$request->file('image');
        $upload_path='';
        if($image){
            $ext=$image->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
                $path='public/books/';
                $upload_path=$path.$name;
                unlink($book->image);
                Image::make($image)
                        ->resize(150,150)
                        ->save($upload_path);
        }

        $upload_path=$upload_path ? $upload_path : $book->image;
        $book->name=$request->name;
        $book->slug=Str::slug($request->name);
        $book->category_id=$request->category;
        $book->author=$request->author;
        $book->publication=$request->publication;
        $book->purchase_date=$request->purchase_date;
        $book->price=$request->price;
        $book->qty=$request->qty;
        $book->image=$upload_path;
        $book->save();

        $notification=array(
            'messege'=>'Created SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('book.index')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $image=$book->image;
        $book->delete();
        unlink($image);
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('book.index')->with($notification);
    }
}
