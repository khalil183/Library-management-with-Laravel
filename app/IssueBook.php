<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    protected $fillable=[
        'student_id','book_id','issue_date','status','qty','return_date'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
