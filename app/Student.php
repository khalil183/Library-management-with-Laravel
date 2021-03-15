<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'user_id','phone','roll','registration','class','year'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
