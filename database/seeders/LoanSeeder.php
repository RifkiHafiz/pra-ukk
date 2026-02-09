<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loan 1: Submitted (waiting for approval)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd') . '-001',
            'borrower_id' => 6, // Muhammad Rizki
            'staff_id' => 3, // Budi Santoso
            'item_id' => 1, // Laptop Dell
            'quantity' => 2,
            'loan_date' => Carbon::now()->addDays(1),
            'return_date' => Carbon::now()->addDays(8),
            'notes' => 'Untuk keperluan presentasi project',
            'status' => 'submitted',
        ]);

        // Loan 2: Submitted (waiting for approval)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd') . '-002',
            'borrower_id' => 7, // Dewi Lestari
            'staff_id' => 4, // Ani Wijaya
            'item_id' => 10, // Kamera DSLR
            'quantity' => 1,
            'loan_date' => Carbon::now()->addDays(2),
            'return_date' => Carbon::now()->addDays(5),
            'notes' => 'Dokumentasi acara kampus',
            'status' => 'submitted',
        ]);

        // Loan 3: Approved (currently borrowed)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-5 days')) . '-003',
            'borrower_id' => 8, // Ahmad Fauzi
            'staff_id' => 3, // Budi Santoso
            'item_id' => 3, // Bola Sepak
            'quantity' => 3,
            'loan_date' => Carbon::now()->subDays(5),
            'return_date' => Carbon::now()->addDays(2),
            'notes' => 'Untuk latihan tim futsal',
            'status' => 'approved',
        ]);

        // Loan 4: Approved (currently borrowed)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-3 days')) . '-004',
            'borrower_id' => 9, // Rina Kartika
            'staff_id' => 4, // Ani Wijaya
            'item_id' => 9, // Projector Epson
            'quantity' => 2,
            'loan_date' => Carbon::now()->subDays(3),
            'return_date' => Carbon::now()->addDays(4),
            'notes' => 'Seminar nasional pendidikan',
            'status' => 'approved',
        ]);

        // Loan 5: Approved (currently borrowed)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-7 days')) . '-005',
            'borrower_id' => 10, // Hendra Gunawan
            'staff_id' => 5, // Dedi Kurniawan
            'item_id' => 5, // Mikroskop Digital
            'quantity' => 1,
            'loan_date' => Carbon::now()->subDays(7),
            'return_date' => Carbon::now()->addDays(7),
            'notes' => 'Penelitian biologi',
            'status' => 'approved',
        ]);

        // Loan 6: Waiting (returned, waiting verification)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-10 days')) . '-006',
            'borrower_id' => 11, // Lina Marlina
            'staff_id' => 3, // Budi Santoso
            'item_id' => 4, // Raket Badminton
            'quantity' => 2,
            'loan_date' => Carbon::now()->subDays(10),
            'return_date' => Carbon::now()->subDays(3),
            'notes' => 'Turnamen badminton antar fakultas',
            'status' => 'waiting',
        ]);

        // Loan 7: Waiting (returned, waiting verification)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-12 days')) . '-007',
            'borrower_id' => 12, // Eko Prasetyo
            'staff_id' => 4, // Ani Wijaya
            'item_id' => 7, // Printer HP
            'quantity' => 1,
            'loan_date' => Carbon::now()->subDays(12),
            'return_date' => Carbon::now()->subDays(5),
            'notes' => 'Print makalah ujian akhir',
            'status' => 'waiting',
        ]);

        // Loan 8: Waiting (returned, waiting verification)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-8 days')) . '-008',
            'borrower_id' => 13, // Fitri Handayani
            'staff_id' => 5, // Dedi Kurniawan
            'item_id' => 11, // Bor Listrik
            'quantity' => 1,
            'loan_date' => Carbon::now()->subDays(8),
            'return_date' => Carbon::now()->subDays(1),
            'notes' => 'Proyek furniture mahasiswa',
            'status' => 'waiting',
        ]);

        // Loan 9: Returned (completed)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-20 days')) . '-009',
            'borrower_id' => 14, // Agus Setiawan
            'staff_id' => 3, // Budi Santoso
            'item_id' => 8, // Scanner Canon
            'quantity' => 1,
            'loan_date' => Carbon::now()->subDays(20),
            'return_date' => Carbon::now()->subDays(13),
            'notes' => 'Digitalisasi dokumen arsip',
            'status' => 'returned',
        ]);

        // Loan 10: Returned (completed)
        Loan::create([
            'loan_code' => 'LOAN-' . date('Ymd', strtotime('-15 days')) . '-010',
            'borrower_id' => 15, // Maya Sari
            'staff_id' => 4, // Ani Wijaya
            'item_id' => 6, // Pipet Volumetrik
            'quantity' => 2,
            'loan_date' => Carbon::now()->subDays(15),
            'return_date' => Carbon::now()->subDays(8),
            'notes' => 'Praktikum kimia organik',
            'status' => 'returned',
        ]);
    }
}
