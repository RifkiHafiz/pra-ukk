<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReturnItem;
use Carbon\Carbon;

class ReturnItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Return for Loan 6 (waiting status)
        ReturnItem::create([
            'loan_id' => 6,
            'staff_id' => 3, // Budi Santoso
            'return_date' => Carbon::now()->subDays(3),
            'condition' => 'good',
            'notes' => 'Semua raket dalam kondisi baik',
        ]);

        // Return for Loan 7 (waiting status)
        ReturnItem::create([
            'loan_id' => 7,
            'staff_id' => 4, // Ani Wijaya
            'return_date' => Carbon::now()->subDays(5),
            'condition' => 'good',
            'notes' => 'Printer berfungsi normal',
        ]);

        // Return for Loan 8 (waiting status)
        ReturnItem::create([
            'loan_id' => 8,
            'staff_id' => 5, // Dedi Kurniawan
            'return_date' => Carbon::now()->subDays(1),
            'condition' => 'good',
            'notes' => 'Bor dikembalikan dalam kondisi bersih',
        ]);

        // Return for Loan 9 (returned/completed)
        ReturnItem::create([
            'loan_id' => 9,
            'staff_id' => 3, // Budi Santoso
            'return_date' => Carbon::now()->subDays(13),
            'condition' => 'good',
            'notes' => 'Scanner tidak ada masalah',
        ]);

        // Return for Loan 10 (returned/completed)
        ReturnItem::create([
            'loan_id' => 10,
            'staff_id' => 4, // Ani Wijaya
            'return_date' => Carbon::now()->subDays(8),
            'condition' => 'damaged',
            'notes' => 'Satu pipet retak, sudah dicatat untuk penggantian',
        ]);
    }
}
