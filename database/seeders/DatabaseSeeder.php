<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Participant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $participants = Participant::factory(10)->create();
        $shuffled_participants = $participants->shuffle();

        $participants->each(function ($item, $key) use($shuffled_participants){
            $item->update([
                'giftee_id' => $shuffled_participants->slice($key, 1)->first()->id
            ]);
        });
    }
}
