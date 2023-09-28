<?php

namespace App\Models;

use App\Models\RoomAmenity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amenity extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'amenities';
    protected $fillable = ['name', 'type', 'created_by', 'updated_by', 'deleted_by'];

    public function getAmenityNameByRoomId()
    {
        return $this->belongsTo(RoomAmenity::class, 'id', 'room_id');
    }
}
