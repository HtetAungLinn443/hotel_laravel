<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomGallery extends Model
{
    use HasFactory;
    protected $table = 'room_galleries';
    protected $fillable = [
        'room_id',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
