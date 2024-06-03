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
        'name_imgQR',
        'Lot_Quantity',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
