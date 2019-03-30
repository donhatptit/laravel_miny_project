<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
            App\User::create([
                'name' => 'Nguyễn Văn B',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 1,
        ]);

    }
}
