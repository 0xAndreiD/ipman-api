<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ipv4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'ipv4', 'comment'
    ];
}
