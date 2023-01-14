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

       TestQuestion::create([
        'test_id' => 1,
        'question_id'=>1
       ]);

       TestQuestion::create([
        'test_id'=>1,
        'question_id'=>2
       ]);

    }
}
