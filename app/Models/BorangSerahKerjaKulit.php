<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorangSerahKerjaKulit extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function sale_order()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'nama', 'id');
    }
}
