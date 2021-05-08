<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $roles = [
           [
               'id' => 1,
               'name' => 'user'
           ],
           [
               'id' => 2,
               'name' => 'writer'
           ],
           [
               'id' => 3,
               'name' => 'moder'
           ],
           [
               'id' => 4,
               'name' => 'admin'
           ]
        ];

        Role::insert($roles);

    }
}
