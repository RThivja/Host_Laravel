<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    use HasFactory;

    protected $table = 'cities'; // Table name
    protected $primaryKey = 'city_id'; // Primary key

    // The fields that are mass assignable
    protected $fillable = [
        'city_name',
        'city_district',
        'city_status'
    ];

    // Disable timestamps if not used
    public $timestamps = false;
}
