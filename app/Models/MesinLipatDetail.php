<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MesinLipatDetail extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = ['machine', 'mesin_lipat_id', 'start_time', 'end_time', 'duration', 'remarks', 'status'];
}
