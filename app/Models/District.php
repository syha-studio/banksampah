<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
