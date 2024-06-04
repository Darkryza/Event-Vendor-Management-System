<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_name',
        'booth_name',
        'phone_number',
        'category',
        'no_of_lot',
        'agreement',
        'receipt_name',
        'status',
        'event_id',
        'user_id'
    ];
}
