<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->count(1)->create([
            'tenant_id' => null,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        Tenant::factory()->count(3)->create();

        foreach (Tenant::all() as $tenant) {

            User::factory()->count(20)->create([
                'tenant_id' => $tenant->id,
            ]);
        }

        //foreach(User::all() as $user) {
        //Login::factory()->count(5)->create([
        //'user_id' => $user->id,
        //'tenant_id' => $user->tenant_id,
        //]);
        //}

    }
}
