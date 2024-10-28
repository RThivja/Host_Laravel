<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_City extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'city_id';
    public $timestamps = false;

    protected $fillable = [
        'city_name',
        'city_district',
    ];

    public function organizations()
    {
        return $this->hasMany(search_Organization::class, 'org_city');
    }

    public function district()
    {
        return $this->belongsTo(search_District::class, 'city_district');
    }
    use HasFactory;
}
