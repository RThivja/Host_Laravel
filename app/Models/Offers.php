<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $table = 'offers';  // Table name

    public $timestamps = true;  // Enable timestamps

    protected $fillable = [
        'heading',
        'image',
        'descriptions',
        'href',
        'status',
    ];
}
