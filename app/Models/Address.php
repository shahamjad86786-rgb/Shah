<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
         'clients_id', 'house_no', 'building', 'street', 'landmark', 'area', 'city', 'state', 'country', 'zip'
    ];
}
