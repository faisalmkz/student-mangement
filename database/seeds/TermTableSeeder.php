<?php

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Term::where('title', 'First Term')->first()) {
            $term = new Term();
            $term->title = 'First Term';
            $term->status = 'active';
            $term->save();
        }

        if (!Term::where('title', 'Second Term')->first()) {
            $term = new Term();
            $term->title = 'Second Term';
            $term->status = 'active';
            $term->save();
        }

        if (!Term::where('title', 'Third Term')->first()) {
            $term = new Term();
            $term->title = 'Third Term';
            $term->status = 'active';
            $term->save();
        }
    }
}
