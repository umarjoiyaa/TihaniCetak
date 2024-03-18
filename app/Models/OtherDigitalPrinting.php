<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherDigitalPrinting extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function parent()
    {
        return $this->belongsTo(DigitalPrinting::class, 'parent_id', 'id');
    }
}
