<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities';
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

    public function getMemberByCity(): HasMany
    {
        return $this->hasMany(Members::class, 'city_id', 'id');
    }
}
