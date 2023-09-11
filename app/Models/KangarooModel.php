<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KangarooModel extends Model
{
    use HasFactory;
    protected $table = "kangaroos";
    protected $fillable = [
        'name',
        'nickname',
        'weight',
        'height',
        'gender',
        'color',
        'friendliness',
        'birthday',
        'user_id'
    ];
}
