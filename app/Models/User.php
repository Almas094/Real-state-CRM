<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'role_id',
        'name',
        'phone',
        'alt_phone',
        'email',
        'company_name',
        'company_logo',
        'status',
        'login_id',
        'project_type_id',
        'remember_password',
        'password',
        'address',
        'photo',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectTypeModel::class, 'project_type_id');
    }

    public function userLimit()
    {
        return $this->belongsTo(UserLimit::class, 'user_limit_id');
    }

    public function order()
    {
        return $this->hasMany(OrderModel::class, 'user_id');
    }

    public function latestOrder()
    {
        return $this->hasOne(OrderModel::class, 'user_id')->latestOfMany();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
