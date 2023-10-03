<?php

 namespace Modules\User\Seeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\Src\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user           = new User();
        $user->name     = 'Bao Van';
        $user->email    = 'baovan33hbt@gmail.com';
        $user->password = Hash::make('123456');
        $user->group_id = 1;
        $user->save();
    }
}
