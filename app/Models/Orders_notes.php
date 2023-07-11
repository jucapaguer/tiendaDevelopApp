<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_notes extends Model
{
    use HasFactory;
    protected $table = "orders_notes";
    protected $primaryKey = 'id';
}
