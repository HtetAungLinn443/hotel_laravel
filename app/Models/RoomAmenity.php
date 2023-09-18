<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomAmenity extends Model
{
    use HasFactory;
    protected $table = 'room_amenities';
    protected $fillable = [
        'room_id',
        'amenity_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // public function getAmenityByRoom(): HasMany
    // {
    //     return $this->hasMany(RoomAmenity::class, 'amenity_id', 'id');
    // }
}
