<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uom_conversion extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function fromUnit()
    {
        return $this->belongsTo(Uom::class, 'from_unit_id', 'id'); // Example: Replace FormUnit with your related model
    }
    public function toUnit()
    {
        return $this->belongsTo(Uom::class, 'to_unit_id', 'id');
    }
}
