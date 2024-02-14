<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaShelf extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function level()
    {
        return $this->belongsTo(AreaLevel::class, 'level_id', 'id');
    }
}
