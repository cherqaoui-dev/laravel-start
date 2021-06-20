<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasAdvancedFilter;

    public $table = 'users';

    public $orderable = [
        'id',
        'name',
        'email',
        'email_verified_at',
    ];

    public $filterable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'roles.title',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}