<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email',
        'password',

        'wallet_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    //SCOPE
    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    //ATTRIBUTE
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    //RELATIONSHIPS

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function promotionCodes()
    {
        return $this->belongsToMany(PromotionCode::class);
    }

    public function token()
    {
        return $this->hasOne(Token::class);
    }

    //FUNCTION

    public function login()
    {
        $token = new Token();
        $token->token = Uuid::uuid4()->toString();
        $token->user()->associate($this);
        $token->save();

        return $token->fresh();
    }
}
