<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];//Do not allow this value to be updated from the App
    protected $with = ['category','author'];//Always Come with these relationships(Prevent too many Database requests)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

}
