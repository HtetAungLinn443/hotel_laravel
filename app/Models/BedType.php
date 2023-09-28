<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BedType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'bed_types';
    protected $fillable = [
        'name', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function getRoomsByBed(): HasMany
    {
        return $this->hasMany(Room::class, 'bed_type_id', 'id');
    }
}
