<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    //
    protected $guarded = ['id'];

    public function users()
    {
        # code...
        return $this->hasMany(User::class);
    }
}
