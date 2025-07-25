<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pickup()
    {
        return $this->hasMany(Pickup::class);
    }

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class);
    }
}
