<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // The name of the table
    protected $primaryKey = 'cate_id'; // Primary key

    // The fields you want to make fillable
    protected $fillable = [
        'cate_name',
        'cate_seo_url',
        'cate_status',
        'created_at',
        'updated_at'
    ];

    // Disable timestamps if they are not used
    public $timestamps = false;
}
