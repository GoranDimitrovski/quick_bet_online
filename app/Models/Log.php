<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {

    public $timestamps = false;
    protected $fillable = [ 'user_id', 'fraction', 'decimal', 'american'];

}
