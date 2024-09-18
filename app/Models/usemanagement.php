<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usemanagement extends Model
{
    use HasFactory;
    protected $table = 'my_users';
    
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
