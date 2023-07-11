<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_rols extends Model
{
    use HasFactory;
    protected $table = "user_rols";
    protected $primaryKey = 'id';
}
