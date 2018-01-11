<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected  $primaryKey = "id";

    protected $fillable = [
        'mail'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
