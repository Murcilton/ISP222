<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enter extends Model
{
    use HasFactory;

    protected $table = 'enter';
    protected $fillable = ['name', 'phone', 'mail'];
}
