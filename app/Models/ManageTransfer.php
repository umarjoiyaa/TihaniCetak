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

    public function materialRequest()
    {
        return $this->belongsTo(MaterialRequest::class, 'request_id', 'id');
    }

    public function manageTransferProductA()
    {
        return $this->hasMany(ManageTransferB::class, 'transfer_id');
    }

    public function manageTransferProductB()
    {
        return $this->hasMany(ManageTransferC::class, 'transfer_id');
    }

    public function manageTransferProductC()
    {
        return $this->hasMany(ManageTransferD::class, 'transfer_id');
    }

    public function materialRequestA()
    {
        return $this->hasMany(MaterialRequestB::class, 'material_id', 'request_id');
    }

    public function materialRequestB()
    {
        return $this->hasMany(MaterialRequestC::class, 'material_id', 'request_id');
    }

    public function materialRequestC()
    {
        return $this->hasMany(MaterialRequestD::class, 'material_id', 'request_id');
    }
}
