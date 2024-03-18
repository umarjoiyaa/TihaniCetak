<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorangSerahKerjaTeks extends Model
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
    public function senari_semak()
    {
        return $this->belongsTo(SenariSemakCetak::class, 'sale_order_id', 'sale_order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
