<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateRequest extends Model
{
    use HasFactory;

    protected $table = 'date_request';
    protected $fillable = [
        'id',
        'invite_id',
        'accept_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
