<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];
    public function bills(){
        return $this->hasMany(Bill::class,'shipping_id');
    }
}
