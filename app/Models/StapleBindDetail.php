<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StapleBindDetail extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = ['machine', 'staple_id', 'start_time', 'end_time', 'duration', 'remarks', 'status'];
}
