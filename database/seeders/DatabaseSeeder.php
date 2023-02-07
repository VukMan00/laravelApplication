<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Models\Test;
use App\Models\TestQuestion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $q1 = Question::create([
            'content'=>'Da li je php objektno orijentisan jezik?'
        ]);

        $q2 = Question::create([
            'content'=>'Koji od ponudjenih jezika takodje spadaju u objektno orijentisane jezike?'
        ]);

        $q3 = Question::create([
            'content'=>'Koji je glavni grad Srbije'
        ]);

        Answer::create([
            'content'=>'Da',
            'answer'=>true,
            'question_id'=>$q1->id
        ]);

        Answer::create([
            'content'=>'Ne',
            'answer'=>false,
            'question_id'=>$q1->id
        ]);

        Answer::create([
            'content'=>'Beograd',
            'answer'=>true,
            'question_id'=>$q3->id
        ]);

        Answer::create([
            'content'=>'Jagodina',
            'answer'=>false,
            'question_id'=>$q3->id
        ]);

        Answer::create([
            'content'=>'JAVA',
            'answer'=>true,
            'question_id'=>$q2->id
        ]);

        Answer::create([
            'content'=>'C#',
            'answer'=>true,
            'question_id'=>$q2->id
        ]);

        Answer::create([
            'content'=>'C',
            'answer'=>false,
            'question_id'=>$q2->id
        ]);

        $t1 = Test::create([
            'name'=>'Internet tehnologije',
            'points'=>30,
            'author'=>'Aleksa Miletic'
        ]);

       TestQuestion::create([
            'test_id' => $t1->id,
            'question_id'=>$q1->id
       ]);

       TestQuestion::create([
            'test_id'=>$t1->id,
            'question_id'=>$q2->id
       ]);

       $t2 = Test::create([
            'name'=>'Test iz geografije',
            'points'=>50,
            'author'=>'Jasna Simic'
       ]);

       TestQuestion::create([
            'test_id'=>$t2->id,
            'question_id'=>$q3->id
       ]);
    }
}
