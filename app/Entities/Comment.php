<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected  $primaryKey = "id";

    protected $fillable = [
        'name',
        'text'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

}
