<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'number_account', 'balance', 'bank_name', 'active'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

}
