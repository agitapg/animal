<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetAnimalListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-animal-list-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // URL endpoint
        $url = 'http://localhost:8000/api/animals';

        // Bearer token
        $bearerToken = '4|3yhIX0MQ1rbGUkdMEFkeyWN5qtsYpzv8MkbhWDM819855d6f';

        // Inisialisasi cURL
        $ch = curl_init($url);

        // Set opsi cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $bearerToken,
            'Content-Type: application/json',
        ]);

        // Eksekusi request dan ambil respon
        $response = curl_exec($ch);

        // Cek jika terjadi kesalahan
        if (curl_errno($ch)) {
            echo json_encode(['error' => curl_error($ch)]);
        } else {
            // Decode respon JSON jika perlu
            $decodedResponse = json_decode($response, true);

            // Tampilkan hasil respon dalam format JSON
            echo json_encode($decodedResponse, JSON_PRETTY_PRINT);
        }

        // Tutup sesi cURL
        curl_close($ch);
    }
}
