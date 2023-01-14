<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';
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
        return $this->belongsToMany(Question::class,'test_question','test_id','question_id');
    }
}
