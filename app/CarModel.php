<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['brand','model','year','valuation','description'];
    protected $guarded = ['id'];
    protected $table = 'car';
    public $timestamps = false;
}
