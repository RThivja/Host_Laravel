<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    protected $fillable = [
        'cate_name',
        'cate_seo_url',
    ];

    public function organizations()
    {
        return $this->belongsToMany(search_Organization::class, 'category__organizations', 'cate_id', 'org_id');
    }
}
