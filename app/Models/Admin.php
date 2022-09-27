<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'id', 'firstName', 'lastName', 'email', 'password', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', '_token'
    ];

    public function scopeSelection($query){
        return $query->select('id','firstName', 'lastName', 'email', 'password', 'created_at', 'updated_at');
    }
}
