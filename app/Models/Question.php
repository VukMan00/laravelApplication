<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = [
        'id',
        'content'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function tests(){
        return $this->hasMany(Test::class);
    }

    protected $guarded=[];


}
