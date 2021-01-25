<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{



    protected $fillable = [
        'title'
    ];

    /**
    * Get the tasks for the category.
    */
    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
