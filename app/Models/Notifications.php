<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'event',
        "notify_to",
        "notify_to",
        "read_by",
        "created_at",
        "created_by"
        
    ];
    public $timestamps = false;
}
