<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomSpecialFeature extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'room_special_features';
    protected $fillable = [
        'room_id',
        'special_feature_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
