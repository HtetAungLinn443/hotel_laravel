<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class View extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'views';
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function getRoomsByView(): HasMany
    {
        return $this->hasMany(Room::class, 'view_id', 'id');
    }
}
