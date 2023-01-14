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

        // \App\Models\User::factory(10)->create();
        Question::create([
            'content'=>'Da li je php objektno orijentisan jezik'
        ]);

        Question::create([
            'content'=>'Koji je glavni grad Srbije'
        ]);

        Answer::create([
            'content'=>'Da',
            'answer'=>true,
            'question_id'=>1
        ]);

        Answer::create([
            'content'=>'Ne',
            'answer'=>false,
            'question_id'=>1
        ]);

        Answer::create([
            'content'=>'Beograd',
            'answer'=>true,
            'question_id'=>2
        ]);

        Answer::create([
            'content'=>'Jagodina',
            'answer'=>false,
            'question_id'=>2
        ]);

        Test::create([
            'name'=>'Internet tehnologije',
            'points'=>30,
            'author'=>'Aleksa Miletic'
        ]);

       TestQuestion::create([
        'test_id' => 1,
        'question_id'=>1
       ]);

       TestQuestion::create([
        'test_id'=>1,
        'question_id'=>2
       ]);


       User::create([
        'username'=>'vukman',
        'email'=>'vukman619@gmail.com',
        'password'=>'vukman00',
        'test_id'=>1
       ]);



    }
}
