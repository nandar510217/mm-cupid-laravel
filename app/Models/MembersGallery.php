<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembersGallery extends Model
{
    use HasFactory;

    protected $table = 'member_gallery';
    protected $fillable = [
        'id',
        'name',
        'sort',
        'member_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getMemberGallery(): BelongsTo
    {
        return $this->belongsTo(Members::class, 'member_id', 'id');
    }
}
