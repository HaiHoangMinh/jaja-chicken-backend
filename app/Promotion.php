<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $timestamp = false;
    protected $guarded = [];
    protected $table = "promotions";
}