<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts'; // Table name
    protected $primaryKey = 'district_id'; // Primary key

    // The fields that are mass assignable
    protected $fillable = [
        'district_name',
        'district_image'
    ];

    // Disable timestamps if they are not used
    public $timestamps = false;
    use HasFactory;
}
