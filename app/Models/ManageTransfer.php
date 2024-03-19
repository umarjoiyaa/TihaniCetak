<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageTransfer extends Model
{
    use HasFactory, SoftDeletes;

    public function material_request()
    {
        return $this->belongsTo(MaterialRequest::class, 'request_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
