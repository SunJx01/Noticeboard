<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    
    protected $fillable = [
        'post_name',
        'posted_by',
        'group_id',
        'verified_by',
        'created_at',
        'updated_at',
        'post_deleted_at'
    ];

}
