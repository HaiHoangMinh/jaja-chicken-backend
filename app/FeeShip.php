<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeShip extends Model
{
    public $timestamp = false;
    protected $guarded = [];
    protected $table = "fee_ships";
}