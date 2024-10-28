<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency',
        'LKR', // This represents the rate column
    ];

    public $timestamps = true;
}
