<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'pincode',
        'address'
    ];
}
