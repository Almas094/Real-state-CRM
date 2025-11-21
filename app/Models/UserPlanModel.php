<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanModel extends Model
{
    use HasFactory;

    protected $table = 'user_plan';

    protected $fillable = [
        'name',
        'price',
        'status',
    ];
}
