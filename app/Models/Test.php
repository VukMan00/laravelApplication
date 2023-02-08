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
<<<<<<< HEAD
    
=======

>>>>>>> 859a9ac94ea663dfdb63226d7fae7f941274c648
    public function questions(){
        return $this->belongsToMany(Question::class,'test_question','test_id','question_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_test','user_id','test_id');
    }
}
