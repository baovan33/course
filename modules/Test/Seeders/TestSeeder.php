<?php

namespace Modules\Test\Seeders;

use Modules\Test\Src\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Test::create([
            'id'  => 1,
            'test' => 'Test'
        ]);
    }
}
