<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function wastePrices()
    {
        return $this->hasMany(WastePrice::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
