<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'description',
        'start_date',
        'end_date',
        'duration',
        'agreement',
        'name_imgPoster',
        'size_imgPoster',
        'name_imgLayout',
        'size_imgLayout',
        'Lot_Quantity',
        'status',
        'user_id'
    ];
}
