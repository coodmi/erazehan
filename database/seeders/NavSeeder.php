<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nav_items')->insert([
            ['label'=>'Services',     'url'=>'#services',     'sort_order'=>1,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['label'=>'Process',      'url'=>'#process',      'sort_order'=>2,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['label'=>'Why Us',       'url'=>'#why-us',       'sort_order'=>3,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['label'=>'Testimonials', 'url'=>'#testimonials', 'sort_order'=>4,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['label'=>'Contact',      'url'=>'#contact',      'sort_order'=>5,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);

        // Add extra site settings for header
        DB::table('site_settings')->insertOrIgnore([
            ['key'=>'logo_text',   'value'=>'GlobalVisa',          'created_at'=>now(),'updated_at'=>now()],
            ['key'=>'logo_url',    'value'=>'',                     'created_at'=>now(),'updated_at'=>now()],
            ['key'=>'nav_cta_text','value'=>'Free Consultation',    'created_at'=>now(),'updated_at'=>now()],
            ['key'=>'nav_cta_link','value'=>'#contact',             'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
