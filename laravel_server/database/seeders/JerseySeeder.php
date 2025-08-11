<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jersey;
use App\Models\Category;

class JerseySeeder extends Seeder
{
    public function run()
    {
        // Create categories
        $categories = [
            ['name' => 'National Teams', 'slug' => 'national-teams'],
            ['name' => 'Club Teams', 'slug' => 'club-teams'],
            ['name' => 'Retro Jerseys', 'slug' => 'retro-jerseys'],
            ['name' => 'Limited Edition', 'slug' => 'limited-edition'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Sample jersey data
        $jerseys = [
            // Premier League
            [
                'name' => 'Manchester United Home 24/25',
                'team' => 'Manchester United',
                'league' => 'Premier League',
                'season' => '2024/25',
                'description' => 'Official Manchester United home jersey for the 2024/25 season. Features the iconic red design with the latest Adidas technology.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 50,
                'is_featured' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Liverpool Away 24/25',
                'team' => 'Liverpool',
                'league' => 'Premier League',
                'season' => '2024/25',
                'description' => 'Liverpool FC away kit featuring a modern design in classic white with red accents.',
                'price' => 94.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'away',
                'stock_quantity' => 45,
                'is_featured' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Chelsea Home 24/25',
                'team' => 'Chelsea',
                'league' => 'Premier League',
                'season' => '2024/25',
                'description' => 'Chelsea FC home jersey in traditional blue with Nike Dri-FIT technology.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 40,
                'category_id' => 2,
            ],
            [
                'name' => 'Arsenal Home 24/25',
                'team' => 'Arsenal',
                'league' => 'Premier League',
                'season' => '2024/25',
                'description' => 'Arsenal home kit featuring the classic red and white design with modern touches.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 35,
                'category_id' => 2,
            ],
            [
                'name' => 'Manchester City Third 24/25',
                'team' => 'Manchester City',
                'league' => 'Premier League',
                'season' => '2024/25',
                'description' => 'Manchester City third kit with unique design inspired by the city\'s culture.',
                'price' => 94.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'third',
                'stock_quantity' => 30,
                'is_featured' => true,
                'category_id' => 2,
            ],

            // La Liga
            [
                'name' => 'Real Madrid Home 24/25',
                'team' => 'Real Madrid',
                'league' => 'La Liga',
                'season' => '2024/25',
                'description' => 'Real Madrid home jersey in classic white with gold accents. Features Adidas HEAT.RDY technology.',
                'price' => 99.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'player_name' => 'Bellingham',
                'player_number' => 5,
                'type' => 'home',
                'stock_quantity' => 60,
                'is_featured' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Barcelona Home 24/25',
                'team' => 'Barcelona',
                'league' => 'La Liga',
                'season' => '2024/25',
                'description' => 'FC Barcelona home kit with the traditional blaugrana stripes and Nike innovation.',
                'price' => 99.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 55,
                'is_featured' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Atletico Madrid Away 24/25',
                'team' => 'Atletico Madrid',
                'league' => 'La Liga',
                'season' => '2024/25',
                'description' => 'Atletico Madrid away jersey featuring a bold design with Nike technology.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'away',
                'stock_quantity' => 25,
                'category_id' => 2,
            ],

            // Serie A
            [
                'name' => 'Juventus Home 24/25',
                'team' => 'Juventus',
                'league' => 'Serie A',
                'season' => '2024/25',
                'description' => 'Juventus home jersey with iconic black and white stripes.',
                'price' => 94.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 40,
                'category_id' => 2,
            ],
            [
                'name' => 'AC Milan Home 24/25',
                'team' => 'AC Milan',
                'league' => 'Serie A',
                'season' => '2024/25',
                'description' => 'AC Milan home kit featuring the classic red and black stripes.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 35,
                'category_id' => 2,
            ],
            [
                'name' => 'Inter Milan Home 24/25',
                'team' => 'Inter Milan',
                'league' => 'Serie A',
                'season' => '2024/25',
                'description' => 'Inter Milan home jersey with the traditional blue and black stripes.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 38,
                'category_id' => 2,
            ],
            [
                'name' => 'Napoli Home 24/25',
                'team' => 'Napoli',
                'league' => 'Serie A',
                'season' => '2024/25',
                'description' => 'SSC Napoli home kit in classic light blue.',
                'price' => 84.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 30,
                'category_id' => 2,
            ],

            // Bundesliga
            [
                'name' => 'Bayern Munich Home 24/25',
                'team' => 'Bayern Munich',
                'league' => 'Bundesliga',
                'season' => '2024/25',
                'description' => 'FC Bayern Munich home jersey in traditional red with Adidas technology.',
                'price' => 94.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'player_name' => 'Kane',
                'player_number' => 9,
                'type' => 'home',
                'stock_quantity' => 45,
                'is_featured' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Borussia Dortmund Home 24/25',
                'team' => 'Borussia Dortmund',
                'league' => 'Bundesliga',
                'season' => '2024/25',
                'description' => 'BVB home kit featuring the iconic yellow and black colors.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 40,
                'category_id' => 2,
            ],
            [
                'name' => 'RB Leipzig Away 24/25',
                'team' => 'RB Leipzig',
                'league' => 'Bundesliga',
                'season' => '2024/25',
                'description' => 'RB Leipzig away jersey with modern design.',
                'price' => 79.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'away',
                'stock_quantity' => 25,
                'category_id' => 2,
            ],

            // Ligue 1
            [
                'name' => 'PSG Home 24/25',
                'team' => 'PSG',
                'league' => 'Ligue 1',
                'season' => '2024/25',
                'description' => 'Paris Saint-Germain home jersey with classic blue design and Jordan branding.',
                'price' => 99.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'player_name' => 'Mbappé',
                'player_number' => 7,
                'type' => 'home',
                'stock_quantity' => 50,
                'is_featured' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Marseille Home 24/25',
                'team' => 'Marseille',
                'league' => 'Ligue 1',
                'season' => '2024/25',
                'description' => 'Olympique de Marseille home kit in traditional white.',
                'price' => 79.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 30,
                'category_id' => 2,
            ],

            // National Teams
            [
                'name' => 'France Home 2024',
                'team' => 'France',
                'league' => 'International',
                'season' => '2024',
                'description' => 'France national team home jersey for Euro 2024.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'home',
                'stock_quantity' => 45,
                'is_featured' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Brazil Away 2024',
                'team' => 'Brazil',
                'league' => 'International',
                'season' => '2024',
                'description' => 'Brazil national team away jersey with Nike design.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'type' => 'away',
                'stock_quantity' => 40,
                'category_id' => 1,
            ],
            [
                'name' => 'Argentina Home 2024',
                'team' => 'Argentina',
                'league' => 'International',
                'season' => '2024',
                'description' => 'Argentina national team home jersey with classic blue and white stripes.',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'player_name' => 'Messi',
                'player_number' => 10,
                'type' => 'home',
                'stock_quantity' => 60,
                'is_featured' => true,
                'category_id' => 1,
            ],

            // Goalkeeper Jerseys
            [
                'name' => 'Real Madrid Goalkeeper 24/25',
                'team' => 'Real Madrid',
                'league' => 'La Liga',
                'season' => '2024/25',
                'description' => 'Real Madrid goalkeeper jersey with advanced grip technology.',
                'price' => 79.99,
                'image_url' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800',
                'player_name' => 'Courtois',
                'player_number' => 1,
                'type' => 'goalkeeper',
                'stock_quantity' => 20,
                'category_id' => 2,
            ],
        ];

        foreach ($jerseys as $jersey) {
            Jersey::create($jersey);
        }
    }
}