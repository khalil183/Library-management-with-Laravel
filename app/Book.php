<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'category_id','name','slug','author','publication','purchase_date','price','qty','image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
