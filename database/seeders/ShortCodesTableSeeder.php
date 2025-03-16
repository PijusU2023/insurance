<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShortCode;

class ShortCodesTableSeeder extends Seeder
{
    public function run()
    {
        ShortCode::updateOrCreate(['shortcode' => 'app_name'], ['replace' => 'Car Management']);
        ShortCode::updateOrCreate(['shortcode' => 'dashboard_title'], ['replace' => 'Welcome to Your Dashboard']);
        ShortCode::updateOrCreate(['shortcode' => 'welcome_message'], ['replace' => 'You have successfully logged in.']);
        ShortCode::updateOrCreate(['shortcode' => 'footer_text'], ['replace' => '© 2025 Car Management – All Rights Reserved.']);

    }
}
