<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WastePrice extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'waste_id', 'price'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }
}
