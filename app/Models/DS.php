<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DS extends Model
{
    use HasFactory;

    protected $table = 'dscollections';

    public $timestamps = true;

    protected $fillable = [
        'heading',
        'image',
        'descriptions',
        'href',
        'status',
    ];
}
