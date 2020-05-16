<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'user_id',
        'consult_add',
        'age',
        'gender',
        'admin_replay',
        'dis_history',
        'consult_body',
        'is_replayed'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Replayed()
    {
        $this->is_replayed = true;
    }
}
