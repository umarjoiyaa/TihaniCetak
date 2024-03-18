<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequestD extends Model
{
    use HasFactory, SoftDeletes;

    public function manage_transfer_d()
    {
        return $this->belongsTo(ManageTransferD::class, 'stock_code', 'stock_code');
    }
}
