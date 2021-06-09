<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('id', 1)->exists()) {
            $user = new User();
            $user->id = 1;
            $user->name = "Admin";
            $user->email = "admin@gmail.com";
            $user->password = bcrypt('Admin@123');
            $user->user_type = "admin";
            $user->status = "active";
            $user->save();
        }
        for($i = 0; $i<5; $i++){
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'user_type' => 'teacher'
            ]);
        }
    }
}
