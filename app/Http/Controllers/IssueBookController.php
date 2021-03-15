<?php

namespace App\Http\Controllers;

use App\IssueBook;
use App\Student;
use App\Book;
use Illuminate\Http\Request;

class IssueBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $IssueBooks=IssueBook::orderBy('id','DESC')->where('status',0)->get();
        return view('issueBook.index',compact('IssueBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books=Book::all();
        $students=Student::all();
        return view('issueBook.create',compact('books','students'));
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
            'student'=>'required',
            'book'=>'required',
            'issue_date'=>'required',
        ]);

       IssueBook::create([
           'student_id'=>$request->student,
           'book_id'=>$request->book,
           'issue_date'=>$request->issue_date,
           'qty'=>1,
           'status'=>1,
       ]);

       $notification=array(
        'messege'=>'Created SuccessfullY',
        'alert-type'=>'success'
         );

    return Redirect()->route('issue-book.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IssueBook  $issueBook
     * @return \Illuminate\Http\Response
     */
    public function show(IssueBook $issueBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IssueBook  $issueBook
     * @return \Illuminate\Http\Response
     */
    public function edit(IssueBook $issueBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IssueBook  $issueBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssueBook $issueBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IssueBook  $issueBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueBook $issueBook)
    {
        $issueBook->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('issue-book.index')->with($notification);
    }

    public function allIssueBook(){
        $IssueBooks=IssueBook::orderBy('id','DESC')->get();
        return view('issueBook.allIssueBook',compact('IssueBooks'));
    }

    public function approvedIssueBook($id){
        $issue_date=date('Y-m-d');
        IssueBook::where('id',$id)->update(['status'=>1,'issue_date'=>$issue_date]);
        $notification=array(
            'messege'=>'Issued SuccessfullY',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }

    public function returnBook(){
        $ReturnBooks=IssueBook::orderBy('id','DESC')->where('status',1)->get();
        return view('issueBook.return',compact('ReturnBooks'));
    }

    public function returnIssueBook($id){
        $return_date=date('Y-m-d');
        $issue=IssueBook::where('id',$id)->update(['status'=>2,'return_date'=>$return_date]);
        $notification=array(
            'messege'=>'Return SuccessfullY',
            'alert-type'=>'success'
             );
        return Redirect()->route('return.book')->with($notification);
    }
}
