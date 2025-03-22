<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Sauce;

class SauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sauce::create([
            'id' => 'S1',
            'userId' => 'U1',
            'name' => 'Hellfire Fear',
            'manufacturer' => 'Hellfire',
            'description' => "Hellfire's sauce is 60% pureed Carolina Reaper pepper, the world's hottest pepper! To bring out the flavor of the pepper, Hellfire has chosen to add spices (cumin, coriander, garlic, onion) and lemon juice.",
            'mainPepper' => 'Carolina Reaper pepper',
            'imageUrl' => 'images/hellfireFear.jpg',
            'heat' => 9,
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => null,
            'usersDisliked' => null,
            'created_at' => date('d-m-Y'),
            'updated_at' => date('d-m-Y'),
        ]);

        Sauce::create([
            'id' => 'S2',
            'userId' => 'U1',
            'name' => 'Hellfire Elixir',
            'manufacturer' => 'Hellfire',
            'description' => "This is a fruity sauce (pineapple, mango, tangerine...) that will bring a sweet flavor to your dishes while spicing them up thanks to its extreme chili peppers: 7 pod and Moruga Scorpion.",
            'mainPepper' => 'Moruga Scorpion',
            'imageUrl' => 'images/hellfireElixir.jpg',
            'heat' => 9,
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => null,
            'usersDisliked' => null,
            'created_at' => date('d-m-Y'),
            'updated_at' => date('d-m-Y'),
        ]);

        Sauce::create([
            'id' => 'S3',
            'userId' => 'U1',
            'name' => 'Jalapeno Fumé',
            'manufacturer' => 'Seed Ranch',
            'description' => "Add a natural aroma to any meal, whether you're barbecuing, making burritos or simply serving eggs!",
            'mainPepper' => 'Jalapeno pepper',
            'imageUrl' => 'images/jalapenoFume.jpg',
            'heat' => 3,
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => null,
            'usersDisliked' => null,
            'created_at' => date('d-m-Y'),
            'updated_at' => date('d-m-Y'),
        ]);

        Sauce::create([
            'id' => 'S4',
            'userId' => 'U1',
            'name' => 'Sauce Ail Noir Jolokia',
            'manufacturer' => "Cajohn's",
            'description' => "It's crazy, the Umami makes us want more, while the Jolokia sets our mouths on fire!",
            'mainPepper' => 'Fresno pepper',
            'imageUrl' => 'images/sauceJolokia.jpg',
            'heat' => 7,
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => null,
            'usersDisliked' => null,
            'created_at' => date('d-m-Y'),
            'updated_at' => date('d-m-Y'),
        ]);
    }
}
