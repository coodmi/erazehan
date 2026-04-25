<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('footer_links')->insert([
            // Services
            ['column'=>'services','label'=>'Student Visa',       'url'=>'#services','sort_order'=>1,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'services','label'=>'Work Visa',          'url'=>'#services','sort_order'=>2,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'services','label'=>'Tourist Visa',       'url'=>'#services','sort_order'=>3,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'services','label'=>'Permanent Residency','url'=>'#services','sort_order'=>4,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'services','label'=>'Business Visa',      'url'=>'#services','sort_order'=>5,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            // Company
            ['column'=>'company','label'=>'About Us',      'url'=>'#','sort_order'=>1,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'company','label'=>'Our Team',      'url'=>'#','sort_order'=>2,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'company','label'=>'Success Stories','url'=>'#','sort_order'=>3,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'company','label'=>'Blog',          'url'=>'#','sort_order'=>4,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'company','label'=>'Careers',       'url'=>'#','sort_order'=>5,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            // Social
            ['column'=>'social','label'=>'Facebook', 'url'=>'#','sort_order'=>1,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'social','label'=>'Twitter',  'url'=>'#','sort_order'=>2,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'social','label'=>'LinkedIn', 'url'=>'#','sort_order'=>3,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['column'=>'social','label'=>'Instagram','url'=>'#','sort_order'=>4,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);

        // Footer settings
        DB::table('site_settings')->insertOrIgnore([
            ['key'=>'footer_logo_url',   'value'=>'',                                                          'created_at'=>now(),'updated_at'=>now()],
            ['key'=>'footer_about',      'value'=>'Your trusted immigration partner since 2009. Certified, experienced, and dedicated to your success.','created_at'=>now(),'updated_at'=>now()],
            ['key'=>'footer_copyright',  'value'=>'Erazehan International. All rights reserved.',             'created_at'=>now(),'updated_at'=>now()],
            ['key'=>'footer_privacy_url','value'=>'#',                                                         'created_at'=>now(),'updated_at'=>now()],
            ['key'=>'footer_terms_url',  'value'=>'#',                                                         'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
