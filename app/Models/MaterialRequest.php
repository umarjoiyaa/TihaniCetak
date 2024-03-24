<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequest extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function sale_order()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id', 'id');
    }

    public function manageTransfer()
    {
        return $this->hasOne(ManageTransfer::class, 'request_id');
    }

}
