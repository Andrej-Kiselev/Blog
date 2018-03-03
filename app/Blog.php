<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'message',
        'atTime',
        'postedBy'
    ];
    protected $dates = ['atTime'];
}
