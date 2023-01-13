<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'points',
        'author'
    ];

    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
