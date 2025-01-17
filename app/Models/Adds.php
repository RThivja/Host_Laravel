<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adds extends Model
{
    use HasFactory;

    protected $table = 'adds';  // Table name

    public $timestamps = true;  // Disable automatic timestamps

    protected $fillable = [
        'Logo',
        'href_link',
        'status',
        'Org_name',
    ];
}
