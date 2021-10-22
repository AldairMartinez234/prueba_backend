<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'second_last_name',
        'first_last_name',
        'email',
        'contract_type',
        'status',
    ];
}
