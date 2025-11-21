<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'name',
        'have_submenu',
        'route_name',
        'icon_class_name',
        'status',
        'sorting_index'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class, 'menu_id');
    }
}
