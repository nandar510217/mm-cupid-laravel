<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobbies extends Model
{
    use HasFactory;
    protected $table = 'hobbies';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'created_by',
        'deleted_at',
        'deleted_by',
        'updated_at',
        'updated_by',
    ];
}
