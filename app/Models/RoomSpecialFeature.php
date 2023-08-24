<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSpecialFeature extends Model
{
    use HasFactory;
    protected $table = 'room_special_features';
    protected $fillable = [
        'room_id',
        'special_feature_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
