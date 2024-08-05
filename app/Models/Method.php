<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function methodCategory()
    {
        return $this->belongsTo(MethodCategory::class);
    }
    
}
