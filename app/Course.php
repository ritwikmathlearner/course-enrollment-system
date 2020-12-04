<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('grades');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
