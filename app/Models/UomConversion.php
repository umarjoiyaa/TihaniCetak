<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UomConversion extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function fromUnit()
    {
        return $this->belongsTo(Uom::class, 'from_unit_id', 'id');
    }
    public function toUnit()
    {
        return $this->belongsTo(Uom::class, 'to_unit_id', 'id');
    }
}
