<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventsTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(MusicsTableSeeder::class);
    }
}
