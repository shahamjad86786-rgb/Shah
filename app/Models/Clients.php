<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Media;


class Clients extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'father_first_name', 'father_middle_name', 'father_last_name', 'email', 'phone', 'dob', 'aadhar'
    ];

    public function Address()
    {
        return $this->hasOne(Address::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }
}
