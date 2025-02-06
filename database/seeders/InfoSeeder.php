<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'name' => 'Example Company',
            'address' => '123 Main Street, City, Country',
            'website' => 'https://example.com',
            'phone' => '+123-456-7890',
            'mobile' => '+098-765-4321',
            'email' => 'info@example.com',
            'admission_season' => 'Winter',
            'admission_year' => '2025',
            'logo' => 'logo.png', // Assuming the logo is stored in the public directory
            'favicon' => 'favicon.ico', // Assuming the favicon is stored in the public directory
            'facebook' => 'https://facebook.com/example',
            'linkedIn' => 'https://linkedin.com/company/example',
            'twitter' => 'https://twitter.com/example',
            'fax' => '+123-456-7891',
            'pobox' => 'PO Box 123',
            'opens' => '09:00 AM',
            'closes' => '05:00 PM',
            'map' => 'https://maps.google.com/example',
            'intro_video' => 'https://youtube.com/example-intro',
            'study_destination_video' => 'https://youtube.com/example-study',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
