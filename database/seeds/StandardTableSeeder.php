<?php

use App\models\Standard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Standard::where('title', "10")->exists()) {
            $standard = new Standard();
            $standard->id = 1;
            $standard->title = "10";
            $standard->save();
        }
    }
}
