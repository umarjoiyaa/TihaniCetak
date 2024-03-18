<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequestC extends Model
{
    use HasFactory, SoftDeletes;

    public function manage_transfer_c()
    {
        return $this->belongsTo(ManageTransferC::class, 'stock_code', 'stock_code');
    }

}
