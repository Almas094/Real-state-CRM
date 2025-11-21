<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RolesModel extends Model
{
    use HasFactory,SoftDeletes;
    

    protected $table = ['roles'];
    protected $fillable = [
        'name',
        'role_tag',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}

