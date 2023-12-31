<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelSetting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hotel_settings';
    protected $fillable = [
        'name',
        'email',
        'address',
        'check_in_time',
        'check_out_time',
        'phone',
        'size_unit',
        'occupancy',
        'price_unit',
        'logo_path',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
