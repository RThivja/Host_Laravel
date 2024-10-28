<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeListing extends Model
{
    protected $table = 'free_listings'; // Table name
    protected $primaryKey = 'org_id';   // Primary key
    public $timestamps = false;         // Disable timestamps

    // Fields that are mass assignable
    protected $fillable = [
        'org_name',
        'org_seo_url',
        'org_city',
        'org_district',
        'org_location',
        'org_base_category',
        'org_description',
        'org_created_date',
        'org_update_date',
        'org_contact'
    ];
    use HasFactory;
}
