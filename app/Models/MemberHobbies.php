<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberHobbies extends Model
{
    use HasFactory;
    protected $table = 'member_hobbies';
    protected $fillable = [
        'member_id',
        'hobby_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function getMemberByMemberHobby(): BelongsTo
    {
        return $this->belongsTo(
            Members::class,
            'member_id',
            'id'
        );
    }

    public function getHobbyByMemberHobby(): BelongsTo
    {
        return $this->belongsTo(
            Hobbies::class,
            'hobby_id',
            'id'
        );
    }
}
