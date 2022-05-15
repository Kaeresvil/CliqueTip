<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'userId',
        'postId',
        'comment',
    ];
}
