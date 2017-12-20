<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'event_name' => $faker->words(2, true),
        'event_place' => $faker->prefecture,
        'event_date' => $faker->dateTimeBetween('-5 years', '+60 days'),
        'created_at' => strtotime('now'),
        'updated_at' => strtotime('now'),
    ];
});

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        'artist_name' => $faker->name,
        'created_at' => strtotime('now'),
        'updated_at' => strtotime('now'),
    ];
});

$unique = array();

$factory->define(App\Music::class, function (Faker $faker) use (&$unique) {
    $events = App\Event::pluck('id')->all();
    $artists = App\Artist::pluck('id')->all();
    $event_id = $faker->randomElement($events);
    $order = $unique[$event_id] = isset($unique[$event_id]) ? $unique[$event_id] + 1 : 1;
    return [
        'event_id' => $event_id,
        'order' => $order,
        'artist_id' => $faker->randomElement($artists),
        'music_name'=> $faker->word,
        'created_at' => strtotime('now'),
        'updated_at' => strtotime('now'),
    ];
});