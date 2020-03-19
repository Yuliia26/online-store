<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'img'];

    public function orders() {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
