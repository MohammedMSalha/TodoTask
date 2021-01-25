<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{



    protected $fillable = [
        'title','user_id','cat_id','desc','due_date'
    ];


    /**
    * Get the category that owns the tasks.
    */
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
