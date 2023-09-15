<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
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

    public function getViewNameByRoom()
    {
        return $this->belongsTo(View::class, 'view_id', 'id');
    }
}
