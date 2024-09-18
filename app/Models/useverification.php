<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class useverification extends Model
{
    use HasFactory;
    protected $table = 'add_users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];
}
