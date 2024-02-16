<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanProsesPencetakani extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function sale_order()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id', 'id');
    }
}
