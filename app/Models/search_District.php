<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_District extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'district_id';
    public $timestamps = false;

    protected $fillable = [
        'district_name',
        'district_image',
    ];

    public function organizations()
    {
        return $this->hasMany(search_Organization::class, 'org_district');
    }

    public function cities()
    {
        return $this->hasMany(search_City::class, 'city_district');
    }
    use HasFactory;
}
