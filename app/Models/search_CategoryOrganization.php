<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_CategoryOrganization extends Model
{
    protected $table = 'category__organizations';
    protected $primaryKey = 'cat_org_id';
    public $timestamps = false;

    protected $fillable = [
        'cate_id',
        'org_id',
    ];
    use HasFactory;
}
