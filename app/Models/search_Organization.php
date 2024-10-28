<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_Organization extends Model
{
    protected $table = 'organizations';
    protected $primaryKey = 'org_id';
    public $timestamps = false;

    protected $fillable = [
        'org_name',
        'org_seo_url',
        'org_city',
        'org_district',
        'org_location',
        'org_base_category',
        'org_description',
    ];

    public function categories()
    {
        return $this->belongsToMany(search_Category::class, 'category__organizations', 'org_id', 'cate_id');
    }

    public function city()
    {
        return $this->belongsTo(search_City::class, 'org_city');
    }

    public function district()
    {
        return $this->belongsTo(search_District::class, 'org_district');
    }
    use HasFactory;
}
