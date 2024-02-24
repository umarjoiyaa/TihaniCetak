<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DigitalPrintingDetail extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = ['machine', 'digital_id', 'start_time', 'end_time', 'status'];
}