<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Phone;
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
        User::factory()
            ->count(10)
            ->create();

        User::each(function ($user) {
            $phone = Phone::factory()->make();
            DB::table('phones')->insert([
                'user_id' => $user->id,
                'number' => $phone->number,
                'type' => $phone->type,
            ]);
        });
    }
}
