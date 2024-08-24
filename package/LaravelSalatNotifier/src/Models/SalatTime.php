<?php

namespace LaravelSalatNotifier\Models;

use Illuminate\Database\Eloquent\Model;

class SalatTime extends Model
{
    protected $fillable = ['name', 'time'];

    protected $table = 'salat_times';
}