<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupDetail extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }

}
