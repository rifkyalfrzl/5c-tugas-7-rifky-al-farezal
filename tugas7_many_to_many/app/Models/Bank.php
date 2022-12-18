<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orangs(){
        return $this->belongsToMany('App\Models\Orang') -> withTimestamps();
    }
}
