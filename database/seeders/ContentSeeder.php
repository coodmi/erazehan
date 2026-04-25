<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hero_slides')->insert([
            ['image_url'=>'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1600&q=80','title'=>'Your Dream Destination','highlight'=>'Starts Here','subtitle'=>'Expert visa and immigration consultancy for students, professionals, and families.','btn1_text'=>'Get Free Consultation','btn1_link'=>'#contact','btn2_text'=>'Explore Services','btn2_link'=>'#services','sort_order'=>1,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['image_url'=>'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1600&q=80','title'=>'Explore the World','highlight'=>'We Open Doors','subtitle'=>'Partnerships across 50+ countries and 15 years of trusted experience.','btn1_text'=>'Start Your Journey','btn1_link'=>'#contact','btn2_text'=>'Our Services','btn2_link'=>'#services','sort_order'=>2,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['image_url'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1600&q=80','title'=>'Your Future Awaits','highlight'=>'Let Us Guide You','subtitle'=>'From student visas to permanent residency, we make every step simple.','btn1_text'=>'Book Consultation','btn1_link'=>'#contact','btn2_text'=>'Learn More','btn2_link'=>'#why-us','sort_order'=>3,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);

        DB::table('services')->insert([
            ['icon'=>'🎓','title'=>'Student Visa','description'=>'University admissions and student visa applications for top destinations including USA, UK, Canada, and Australia.','sort_order'=>1,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'💼','title'=>'Work Visa','description'=>'Skilled worker, intra-company transfer, and employer-sponsored work permits handled end-to-end.','sort_order'=>2,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'✈️','title'=>'Tourist Visa','description'=>'Fast-track tourist and visitor visa processing with high approval rates.','sort_order'=>3,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'🏠','title'=>'Permanent Residency','description'=>'PR pathways including Express Entry, Points-Based Systems, and family sponsorship.','sort_order'=>4,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'👨‍👩‍👧','title'=>'Family Reunification','description'=>'Spouse, dependent, and family reunion visa applications with compassionate guidance.','sort_order'=>5,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'🏢','title'=>'Business Visa','description'=>'Investor, entrepreneur, and business visitor visas for global expansion.','sort_order'=>6,'active'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);

        DB::table('stats')->insert([
            ['value'=>'10K+','label'=>'Visas Approved','sort_order'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['value'=>'98%','label'=>'Success Rate','sort_order'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['value'=>'50+','label'=>'Countries','sort_order'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['value'=>'15+','label'=>'Years Experience','sort_order'=>4,'created_at'=>now(),'updated_at'=>now()],
        ]);

        DB::table('testimonials')->insert([
            ['name'=>'Sarah M.','visa_type'=>'Canada PR','content'=>'GlobalVisa made the entire PR process stress-free. Got my PR in 8 months!','flag'=>'🇨🇦','active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Ahmed K.','visa_type'=>'UK Student Visa','content'=>'I was rejected once before finding GlobalVisa. They helped me reapply and I got my visa within 3 weeks.','flag'=>'🇬🇧','active'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Priya R.','visa_type'=>'Australia Work Visa','content'=>'Professional, efficient, and genuinely caring team. Received my skilled worker visa without any hassle.','flag'=>'🇦🇺','active'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);

        DB::table('why_us_points')->insert([
            ['icon'=>'✓','title'=>'RCIC & OISC certified consultants','description'=>null,'sort_order'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'✓','title'=>'Transparent pricing — no hidden fees','description'=>null,'sort_order'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'✓','title'=>'Dedicated case manager for every client','description'=>null,'sort_order'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'✓','title'=>'Real-time application tracking portal','description'=>null,'sort_order'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['icon'=>'✓','title'=>'98% visa approval success rate','description'=>null,'sort_order'=>5,'created_at'=>now(),'updated_at'=>now()],
        ]);

        DB::table('site_settings')->insert([
            ['key'=>'site_name','value'=>'GlobalVisa','created_at'=>now(),'updated_at'=>now()],
            ['key'=>'tagline','value'=>'Your Trusted Immigration Partner','created_at'=>now(),'updated_at'=>now()],
            ['key'=>'phone','value'=>'+1 (800) 555-VISA','created_at'=>now(),'updated_at'=>now()],
            ['key'=>'email','value'=>'info@globalvisa.com','created_at'=>now(),'updated_at'=>now()],
            ['key'=>'address','value'=>'123 Immigration Ave, Suite 400, Toronto, ON M5V 2T6','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
