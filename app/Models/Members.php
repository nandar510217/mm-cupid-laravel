<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Members extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'id',
        'username',
        'password',
        'email',
        'gender',
        'phone',
        'email_confirm_code',
        'date_of_birth',
        'education',
        'city_id',
        'work',
        'height_feet',
        'height_inches',
        'status',
        'religion',
        'about',
        'partner_gender',
        'partner_min_age',
        'partner_max_age',
        'last_login',
        'point',
        'view_count',
        'thumb_nail',
        'verify_image',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getCityByMember(): BelongsTo
    {
        return $this->belongsTo(
            Cities::class,
            'city_id',
            'id'
        );
    }

    public function getMemberGallery(): HasMany
    {
        return $this->hasMany(
            MembersGallery::class,
            'member_id',
            'id'
        );
    }

    public function getMemberHobbiesByMember(): HasMany
    {
        return $this->hasMany(
            MemberHobbies::class,
            'member_id',
            'id'
        );
    }
}
