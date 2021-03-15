<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name'=>'required',
        ]);

        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name)
        ]);

        $notification=array(
            'messege'=>'Category Created SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('category.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->save();

        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('category.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('category.index')->with($notification);
    }
}
