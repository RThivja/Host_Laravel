<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories'; // Your database table name

    protected $primaryKey = 'cate_id'; // Primary key for the table

    public $timestamps = false; // If your table doesn't have created_at/updated_at columns

    protected $fillable = ['cate_name', 'cate_status']; // Mass assignable fields control which fields can be updated:
}
