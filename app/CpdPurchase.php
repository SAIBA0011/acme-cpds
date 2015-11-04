<?php

namespace App;

use App\Cpd;
use App\User;
use Illuminate\Database\Eloquent\Model;

class CpdPurchase extends Model
{
    protected $table = 'cpd_purchases';

    protected $fillable = ['user_id', 'cpd_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function cpd()
    {
    	return $this->belongsTo(Cpd::class);
    }
}
