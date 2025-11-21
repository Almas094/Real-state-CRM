<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Role extends Model

{

    use HasFactory;



    protected $fillable = [

        'name',

        'role_tag',

        'status',

    ];



    public function menu()

    {

        return $this->hasMany(Menu::class);

    }

}

