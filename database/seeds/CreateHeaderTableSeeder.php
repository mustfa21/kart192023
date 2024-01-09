<?php

use Illuminate\Database\Seeder;

class CreateHeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('headers')->delete();

        $headers = [
            ['title' => 'Home', 'meta_title' => 'Home', 'slug' => 'home'],
            ['title' => 'About', 'meta_title' => 'About', 'slug' => 'about'],
            ['title' => 'Services', 'meta_title' => 'Services', 'slug' => 'services'],
            ['title' => 'Projects', 'meta_title' => 'Projects', 'slug' => 'portfolios'],
            ['title' => 'Pricing', 'meta_title' => 'Pricing', 'slug' => 'pricing'],
            ['title' => 'News', 'meta_title' => 'News', 'slug' => 'blog'],
            ['title' => 'FAQs', 'meta_title' => 'FAQs', 'slug' => 'faqs'],
            ['title' => 'Contact', 'meta_title' => 'Contact', 'slug' => 'contact'],
            ['title' => 'Error 404', 'meta_title' => 'Error 404', 'slug' => 'error'],
        ];

        DB::table('headers')->insert($headers);
    }
}
