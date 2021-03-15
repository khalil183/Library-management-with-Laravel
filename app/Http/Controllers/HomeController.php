<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Student;
use App\IssueBook;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books=Book::all();
        $IssueBooks=IssueBook::orderBy('id','DESC')->where('status',0)->get();
        return view('home',compact('books','IssueBooks'));
    }
}
