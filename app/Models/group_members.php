<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_members extends Model
{
    use HasFactory;
    protected $table = 'group_members';
    
    protected $fillable = [
        'user_id',
        'group_id',
        'added_by',
        'created_at',
        'updated_at',
        'group_left_at'
    ];

}
