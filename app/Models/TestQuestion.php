<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;

    protected $table = 'test_question';
    protected $fillable = [
        'test_id',
        'question_id',
    ];

    protected $guarded=[];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
