<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class PromotionCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'start_date',
        'end_date',
        'amount',
        'quota',

        'created_at',
        'updated_at',
    ];

    //SCOPE

    //ATTRIBUTE

    //RELATIONSHIPS
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //FUNCTION
}
