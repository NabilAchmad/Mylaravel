<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title'
    ];
}
