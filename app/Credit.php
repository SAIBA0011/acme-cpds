<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = [
    	'user_id',
    	'balance'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
