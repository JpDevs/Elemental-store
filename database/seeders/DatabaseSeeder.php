<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $user;

    public function __construct()
    {
        $this->user = new UserSeeders();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->user->run();
    }
}
