<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'room_id',
        'customer_id',
        'is_extra_bed',
        'price',
        'check_in_time',
        'check_out_time',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function getRoomById(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function getCustomerById(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
