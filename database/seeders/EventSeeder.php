<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'title' => 'Event ' . ($i + 1),
                'description' => 'Description for Event ' . ($i + 1),
                'content' => 'Content for Event ' . ($i + 1),
                'date' => date('Y-m-d H:i:s'), 
                'location_id' => '1', 
                'categorie_id' => '1', 
                'image' => 'path/to/image' . rand(1, 10) . '.jpg',
            ];
        
            Event::create($data);
        }
        
        echo "Les 10 événements ont été créés avec succès.";
    }
}
