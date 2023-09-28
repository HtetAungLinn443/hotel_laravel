<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomGallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'room_galleries';
    protected $fillable = [
        'room_id',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
