<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Hash;
use App\Book;
use App\IssueBook;
use Auth;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.registration');
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
            'email'=>'required|unique:users',
            'phone'=>'required|unique:students',
            'roll'=>'required|unique:students',
            'registration'=>'required|unique:students',
            'class'=>'required',
            'year'=>'required',
            'password'=>'required',
        ]);


        $user= new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->user_type= 2;
        $user->save();

        $student=new Student;
        $student->user_id= $user->id;
        $student->phone= $request->phone;
        $student->roll= $request->roll;
        $student->registration= $request->registration;
        $student->class= $request->class;
        $student->year= $request->year;
        $student->save();


        return Redirect()->route('login');

    }

    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function addIssue($id){
        $student=Student::where('user_id',Auth::user()->id)->first();
        IssueBook::create([
            'student_id'=>$student->id,
            'book_id'=>1,
            'qty'=>1,
            'status'=>0
        ]);

        $notification=array(
            'messege'=>'Added SuccessfullY',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }

    public function myIssuedBook(){
        $student=Student::where('user_id',Auth::user()->id)->first();
        $issuedBooks=IssueBook::where('student_id',$student->id)->get();
        return view('student.issueBook',compact('issuedBooks'));
    }
}
