<?php

namespace App\Models;

use App\Models\BedType;
use App\Models\RoomGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'size',
        'occupancy',
        'bed_type_id',
        'view_id',
        'description',
        'detail',
        'price_per_day',
        'extra_bed_price_per_day',
        'thumbnail_img',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function getViewNameByRoom(): BelongsTo
    {
        return $this->belongsTo(View::class, 'view_id', 'id');
    }
    public function getBedNameByRoom(): BelongsTo
    {
        return $this->belongsTo(BedType::class, 'bed_type_id', 'id');
    }
    public function getGalleriesByRoom(): HasMany
    {
        return $this->hasMany(RoomGallery::class, 'room_id', 'id');
    }

}
