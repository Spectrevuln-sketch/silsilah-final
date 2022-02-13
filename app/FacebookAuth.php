<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacebookAuth extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'birth_order',
        'nickname', 'gender_id', 'name',
        'email', 'password',
        'address', 'phone',
        'dob', 'yob', 'dod', 'yod', 'city',
        'father_id', 'mother_id', 'parent_id',
    ];



}
