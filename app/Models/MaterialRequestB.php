<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequestB extends Model
{
    use HasFactory, SoftDeletes;

    public function manage_transfer_b()
    {
        return $this->belongsTo(ManageTransferB::class, 'stock_code', 'stock_code');
    }

}
