<?php

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Subject::where('title', 'Maths')->where('standard_id', 1)->first()) {
            $subject = new Subject();
            $subject->title = 'Maths';
            $subject->standard_id = '1';
            $subject->save();
        }
        if (!Subject::where('title', 'Sceince')->where('standard_id', 1)->first()) {
            $subject = new Subject();
            $subject->title = 'Sceince';
            $subject->standard_id = '1';
            $subject->save();
        }
        if (!Subject::where('title', 'History')->where('standard_id', 1)->first()) {
            $subject = new Subject();
            $subject->title = 'History';
            $subject->standard_id = '1';
            $subject->save();
        }
    }
}
