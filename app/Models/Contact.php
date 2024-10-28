<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';      // Table name
    protected $primaryKey = 'contact_id';  // Primary key
    public $timestamps = false;         // Disable timestamps

    protected $fillable = [
        'org_id',
        'type',
        'value'
    ];
    use HasFactory;
}
