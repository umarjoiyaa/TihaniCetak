<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function senari_semak()
    {
        return $this->belongsTo(SenariSemakCetak::class, 'id', 'sale_order_id');
    }
}
