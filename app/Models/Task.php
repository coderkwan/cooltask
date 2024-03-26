<?php

namespace App\Models;


class Task extends Authenticatable
{
    protected $fillable = [
        'task',
        'content',
        'status',
        'user_id',
    ];
}
