<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'organiser',
        'location',
        'description',
        'start_date',
        'end_date',
        'duration',
        'agreement',
        'name_imgPoster',
        'name_imgLayout',
        'name_imgQR',
        'lot_price',
        'Lot_Quantity',
        'availabality',
        'status',
        'approval',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
