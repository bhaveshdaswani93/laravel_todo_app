<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Todo::class,5)->create();
    }
}
