<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'balance',

        'user_id',
    ];

    //SCOPE

    //ATTRIBUTE

    //RELATIONSHIPS
    public function user()
    {
        return $this->hasOne(User::class);
    }

    //FUNCTION
}
