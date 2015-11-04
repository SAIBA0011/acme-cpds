<?php

namespace App;

use App\Cpd;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'cpd_id',
    	'name',
    	'link'
    ];

    public function cpd()
    {
    	return $this->belongsTo(Cpd::class);
    }
}
