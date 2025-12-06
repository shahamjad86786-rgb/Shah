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

    protected $casts = [
        'dob' => 'date',
    ];

    public function Address()
    {
        return $this->hasOne(Address::class);
    }

    public function profilePicture()
    {
        return $this->media()->where('name', 'passport_picture')->first();
    }

    public function signature()
    {
        return $this->media()->where('name', 'signature')->first();
    }

    public function aadharFront()
    {
        return $this->media()->where('name', 'aadhar_front')->first();
    }

    public function aadharBack()
    {
        return $this->media()->where('name', 'aadhar_back')->first();
    }

    public function panCard()
    {
        return $this->media()->where('name', 'pan_card')->first();
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }
}
