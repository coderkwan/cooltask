<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task',
        'content',
        'status',
        'user_id',
    ];
    public $timestamps = true;
}
