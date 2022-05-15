<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostManagement extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'userId',
        'post'
    ];
}
