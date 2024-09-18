<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;
    
    protected $table = 'group';
    
    protected $fillable = [
        'group_name',
        'created_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

}
