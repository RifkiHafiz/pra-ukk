<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Updated to reflect new features:
     * - staff_id is null for submitted/cancelled loans (not yet processed)
     * - staff_id filled when approved/rejected by staff or admin
     * - rejected_reason filled for rejected loans
     * - rejected_reason filled for cancelled loans (as cancellation reason)
     * - New 'cancelled' and 'borrowed' statuses included
     */
    public function run(): void
    {
        // ── SUBMITTED (belum diproses, staff_id null) ──────────────────

        // Loan 1: Submitted - waiting for approval
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd') . '-001',
            'borrower_id' => 6,    // Muhammad Rizki
            'staff_id'    => null, // belum diproses
            'item_id'     => 1,    // Laptop Dell
            'quantity'    => 2,
            'loan_date'   => Carbon::now()->addDays(1),
            'return_date' => Carbon::now()->addDays(8),
            'notes'       => 'Untuk keperluan presentasi project',
            'status'      => 'submitted',
        ]);

        // Loan 2: Submitted - waiting for approval
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd') . '-002',
            'borrower_id' => 7,    // Dewi Lestari
            'staff_id'    => null, // belum diproses
            'item_id'     => 10,   // Kamera DSLR
            'quantity'    => 1,
            'loan_date'   => Carbon::now()->addDays(2),
            'return_date' => Carbon::now()->addDays(5),
            'notes'       => 'Dokumentasi acara kampus',
            'status'      => 'submitted',
        ]);

        // ── APPROVED (disetujui staff, menunggu dipinjam) ───────────────

        // Loan 3: Approved by staff
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-5 days')) . '-003',
            'borrower_id' => 8,  // Ahmad Fauzi
            'staff_id'    => 3,  // Budi Santoso (yang approve)
            'item_id'     => 3,  // Bola Sepak
            'quantity'    => 3,
            'loan_date'   => Carbon::now()->subDays(5),
            'return_date' => Carbon::now()->addDays(2),
            'notes'       => 'Untuk latihan tim futsal',
            'status'      => 'approved',
        ]);

        // Loan 4: Approved by staff
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-3 days')) . '-004',
            'borrower_id' => 9,  // Rina Kartika
            'staff_id'    => 4,  // Ani Wijaya (yang approve)
            'item_id'     => 9,  // Projector Epson
            'quantity'    => 2,
            'loan_date'   => Carbon::now()->subDays(3),
            'return_date' => Carbon::now()->addDays(4),
            'notes'       => 'Seminar nasional pendidikan',
            'status'      => 'approved',
        ]);

        // ── BORROWED (sedang dipinjam) ──────────────────────────────────

        // Loan 5: Borrowed - currently in use
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-7 days')) . '-005',
            'borrower_id' => 10, // Hendra Gunawan
            'staff_id'    => 5,  // Dedi Kurniawan (yang approve)
            'item_id'     => 5,  // Mikroskop Digital
            'quantity'    => 1,
            'loan_date'   => Carbon::now()->subDays(7),
            'return_date' => Carbon::now()->addDays(7),
            'notes'       => 'Penelitian biologi',
            'status'      => 'borrowed',
        ]);

        // ── WAITING (dikembalikan, menunggu verifikasi) ─────────────────

        // Loan 6: Waiting verification after return
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-10 days')) . '-006',
            'borrower_id' => 11, // Lina Marlina
            'staff_id'    => 3,  // Budi Santoso
            'item_id'     => 4,  // Raket Badminton
            'quantity'    => 2,
            'loan_date'   => Carbon::now()->subDays(10),
            'return_date' => Carbon::now()->subDays(3),
            'notes'       => 'Turnamen badminton antar fakultas',
            'status'      => 'waiting',
        ]);

        // Loan 7: Waiting verification after return
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-12 days')) . '-007',
            'borrower_id' => 12, // Eko Prasetyo
            'staff_id'    => 4,  // Ani Wijaya
            'item_id'     => 7,  // Printer HP
            'quantity'    => 1,
            'loan_date'   => Carbon::now()->subDays(12),
            'return_date' => Carbon::now()->subDays(5),
            'notes'       => 'Print makalah ujian akhir',
            'status'      => 'waiting',
        ]);

        // ── REJECTED (ditolak oleh staff/admin, wajib ada rejected_reason) ──

        // Loan 8: Rejected by staff - item stock insufficient
        Loan::create([
            'loan_code'       => 'LOAN-' . date('Ymd', strtotime('-8 days')) . '-008',
            'borrower_id'     => 13, // Fitri Handayani
            'staff_id'        => 3,  // Budi Santoso (yang reject)
            'item_id'         => 11, // Bor Listrik
            'quantity'        => 1,
            'loan_date'       => Carbon::now()->subDays(8),
            'return_date'     => Carbon::now()->subDays(1),
            'notes'           => 'Proyek furniture mahasiswa',
            'rejected_reason' => 'Stok item sedang tidak tersedia, semua unit sedang dipinjam oleh peminjam lain.',
            'status'          => 'rejected',
        ]);

        // Loan 9: Rejected by admin - incomplete documentation
        Loan::create([
            'loan_code'       => 'LOAN-' . date('Ymd', strtotime('-4 days')) . '-009',
            'borrower_id'     => 14, // Agus Setiawan
            'staff_id'        => 2,  // Rifki (admin yang reject)
            'item_id'         => 8,  // Scanner Canon
            'quantity'        => 1,
            'loan_date'       => Carbon::now()->addDays(1),
            'return_date'     => Carbon::now()->addDays(6),
            'notes'           => 'Digitalisasi dokumen arsip',
            'rejected_reason' => 'Pengajuan tidak menyertakan surat izin dari kepala departemen. Harap lengkapi dokumen dan ajukan ulang.',
            'status'          => 'rejected',
        ]);

        // ── CANCELLED (dibatalkan oleh borrower, wajib ada rejected_reason) ──

        // Loan 10: Cancelled by borrower - no longer needed
        Loan::create([
            'loan_code'       => 'LOAN-' . date('Ymd', strtotime('-6 days')) . '-010',
            'borrower_id'     => 15, // Maya Sari
            'staff_id'        => null, // belum sempat diproses sebelum cancel
            'item_id'         => 6,   // Pipet Volumetrik
            'quantity'        => 2,
            'loan_date'       => Carbon::now()->addDays(1),
            'return_date'     => Carbon::now()->addDays(7),
            'notes'           => 'Praktikum kimia organik',
            'rejected_reason' => 'Praktikum ditunda oleh dosen, barang tidak jadi diperlukan untuk saat ini.',
            'status'          => 'cancelled',
        ]);

        // ── RETURNED (selesai, sudah diverifikasi) ──────────────────────

        // Loan 11: Returned and completed
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-20 days')) . '-011',
            'borrower_id' => 6,  // Muhammad Rizki
            'staff_id'    => 5,  // Dedi Kurniawan
            'item_id'     => 2,  // MacBook Pro
            'quantity'    => 1,
            'loan_date'   => Carbon::now()->subDays(20),
            'return_date' => Carbon::now()->subDays(13),
            'notes'       => 'Presentasi tugas akhir semester',
            'status'      => 'returned',
        ]);

        // Loan 12: Returned and completed
        Loan::create([
            'loan_code'   => 'LOAN-' . date('Ymd', strtotime('-15 days')) . '-012',
            'borrower_id' => 7,  // Dewi Lestari
            'staff_id'    => 3,  // Budi Santoso
            'item_id'     => 12, // Tangga Lipat
            'quantity'    => 1,
            'loan_date'   => Carbon::now()->subDays(15),
            'return_date' => Carbon::now()->subDays(8),
            'notes'       => 'Pemasangan dekorasi aula kampus',
            'status'      => 'returned',
        ]);
    }
}
