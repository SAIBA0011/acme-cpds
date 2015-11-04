<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Cpd extends Model
{
    protected $table = 'cpds';

    protected $fillable = [
    	'name',
    	'description',
    	'article_link',
    	'points',
    	'cost',
    	'accreditation_number',
    	'expiry_date'
    ];

    protected $dates = ['expiry_date'];

    public function articles()
    {
    	return $this->hasMany(Article::class);
    }
}
