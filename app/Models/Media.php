<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'model_type', 'model_id', 'name', 'type', 'path', 'url'
    ];
}
