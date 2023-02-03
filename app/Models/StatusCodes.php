<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCodes extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'code'];
}
