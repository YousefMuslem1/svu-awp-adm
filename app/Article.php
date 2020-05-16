<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
     use SoftDeletes;
    protected $fillable = ['category_id', 'title', 'description', 'image'];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
