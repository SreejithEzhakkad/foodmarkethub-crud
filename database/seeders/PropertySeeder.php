<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Phone;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()
            ->count(10)
            ->create();

        Property::each(function ($property) {

            DB::table('property_user')->insert(
                [
                    'property_id' => $property->id,
                    'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                    'main_owner' => (bool)random_int(0, 1)
                ]
            );
            
           
        });
    }
}
