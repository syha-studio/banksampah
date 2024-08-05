<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function wastePrice()
    {
        return $this->hasMany(WastePrice::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
