<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Electronics (category_id: 1)
        Item::create([
            'category_id' => 1,
            'item_code' => 'ELEC-001',
            'item_name' => 'Laptop Dell Latitude 5420',
            'total_quantity' => 10,
            'available_quantity' => 7,
            'condition' => 'Good',
        ]);

        Item::create([
            'category_id' => 1,
            'item_code' => 'ELEC-002',
            'item_name' => 'Tablet Samsung Galaxy Tab S8',
            'total_quantity' => 8,
            'available_quantity' => 8,
            'condition' => 'Good',
        ]);

        // Sports Equipment (category_id: 2)
        Item::create([
            'category_id' => 2,
            'item_code' => 'SPORT-001',
            'item_name' => 'Bola Sepak Adidas',
            'total_quantity' => 15,
            'available_quantity' => 12,
            'condition' => 'Good',
        ]);

        Item::create([
            'category_id' => 2,
            'item_code' => 'SPORT-002',
            'item_name' => 'Raket Badminton Yonex',
            'total_quantity' => 20,
            'available_quantity' => 18,
            'condition' => 'Good',
        ]);

        // Laboratory Equipment (category_id: 3)
        Item::create([
            'category_id' => 3,
            'item_code' => 'LAB-001',
            'item_name' => 'Mikroskop Digital Olympus',
            'total_quantity' => 5,
            'available_quantity' => 4,
            'condition' => 'Good',
        ]);

        Item::create([
            'category_id' => 3,
            'item_code' => 'LAB-002',
            'item_name' => 'Pipet Volumetrik Set',
            'total_quantity' => 12,
            'available_quantity' => 10,
            'condition' => 'Good',
        ]);

        // Office Equipment (category_id: 4)
        Item::create([
            'category_id' => 4,
            'item_code' => 'OFF-001',
            'item_name' => 'Printer HP LaserJet Pro',
            'total_quantity' => 6,
            'available_quantity' => 5,
            'condition' => 'Good',
        ]);

        Item::create([
            'category_id' => 4,
            'item_code' => 'OFF-002',
            'item_name' => 'Scanner Canon LiDE 400',
            'total_quantity' => 4,
            'available_quantity' => 3,
            'condition' => 'Good',
        ]);

        // Audio Visual Equipment (category_id: 5)
        Item::create([
            'category_id' => 5,
            'item_code' => 'AV-001',
            'item_name' => 'Projector Epson EB-X05',
            'total_quantity' => 8,
            'available_quantity' => 6,
            'condition' => 'Good',
        ]);

        Item::create([
            'category_id' => 5,
            'item_code' => 'AV-002',
            'item_name' => 'Kamera DSLR Canon EOS 90D',
            'total_quantity' => 3,
            'available_quantity' => 2,
            'condition' => 'Good',
        ]);

        // Power Tools (category_id: 6)
        Item::create([
            'category_id' => 6,
            'item_code' => 'TOOL-001',
            'item_name' => 'Bor Listrik Makita HP1630',
            'total_quantity' => 7,
            'available_quantity' => 6,
            'condition' => 'Good',
        ]);

        Item::create([
            'category_id' => 6,
            'item_code' => 'TOOL-002',
            'item_name' => 'Mesin Gerinda Bosch GWS 060',
            'total_quantity' => 5,
            'available_quantity' => 4,
            'condition' => 'Damaged',
        ]);
    }
}
