<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Erazehan International – Your Trusted Immigration Partner</title>
    <meta name="description" content="Expert visa and immigration consultancy services. Student, work, tourist, and PR visas handled by certified professionals." />

    <!-- Tailwind CDN (swap for compiled asset in production) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { DEFAULT: '#1a56db', dark: '#1e429f', light: '#ebf5ff' },
                        gold:  '#f59e0b',
                    }
                }
            }
        }
    </script>

    <!-- AOS animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    <style>
        html { scroll-behavior: smooth; }
        .card-hover { transition: transform .25s, box-shadow .25s; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,.12); }

        /* ── Hero Slider ── */
        #hero-slider {
            position: relative; overflow: hidden;
            height: 100vh; min-height: 520px;
        }

        .slide {
            position: absolute; inset: 0;
            background-size: cover; background-position: center;
            opacity: 0; transition: opacity 1.1s ease;
        }
        .slide.active { opacity: 1; }

        .slide-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to right, rgba(10,20,80,.72) 0%, rgba(10,20,80,.35) 60%, transparent 100%);
        }

        /* dot buttons */
        .slider-dot {
            width: 28px; height: 4px; border-radius: 2px;
            background: rgba(255,255,255,.4); border: none; cursor: pointer;
            transition: background .3s, width .3s;
        }
        .slider-dot.active { background: #f97316; width: 44px; }

        /* arrow buttons */
        .slider-arrow {
            position: absolute; top: 50%; transform: translateY(-50%);
            z-index: 20; background: rgba(255,255,255,.12);
            border: 1.5px solid rgba(255,255,255,.4);
            color: #fff; width: 42px; height: 42px; border-radius: 9999px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: background .2s;
        }
        .slider-arrow:hover { background: rgba(255,255,255,.25); }
        #prevBtn { left: 18px; }
        #nextBtn { right: 18px; }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased">

<!-- ─── NAVBAR ─────────────────────────────────────────────────────────── -->
<header class="fixed inset-x-0 top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

        <!-- Logo -->
        <a href="#" class="flex items-center gap-2 font-bold text-lg sm:text-xl text-brand relative z-50">
            @if(!empty($settings['logo_url']))
                <img src="{{ $settings['logo_url'] }}" alt="{{ $settings['logo_text'] ?? 'Logo' }}" class="h-8 sm:h-9 w-auto object-contain"/>
            @else
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-gold" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93V18c0-.55.45-1 1-1s1 .45 1 1v1.93A8.01 8.01 0 0 1 4.07 13H6c.55 0 1 .45 1 1s-.45 1-1 1H4.07A8.01 8.01 0 0 1 11 19.93zM4.07 11H6c.55 0 1-.45 1-1s-.45-1-1-1H4.07A8.01 8.01 0 0 1 11 4.07V6c0 .55.45 1 1 1s1-.45 1-1V4.07A8.01 8.01 0 0 1 19.93 11H18c-.55 0-1 .45-1 1s.45 1 1 1h1.93A8.01 8.01 0 0 1 13 19.93V18c0-.55-.45-1-1-1s-1 .45-1 1v1.93A8.01 8.01 0 0 1 4.07 13H6"/>
                </svg>
                <span class="hidden xs:inline">{{ $settings['logo_text'] ?? 'Erazehan International' }}</span>
            @endif
        </a>

        <!-- Desktop nav -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
            @foreach($navItems as $item)
            <a href="{{ $item->url }}" class="hover:text-brand transition-colors duration-200">{{ $item->label }}</a>
            @endforeach
        </nav>

        <!-- CTA -->
        <a href="{{ $settings['nav_cta_link'] ?? '#contact' }}"
           class="hidden md:inline-flex items-center gap-2 bg-brand text-white text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-brand-dark transition-all duration-200 shadow-sm hover:shadow-md">
            {{ $settings['nav_cta_text'] ?? 'Free Consultation' }}
        </a>

        <!-- Mobile toggle -->
        <button id="menuBtn" class="md:hidden p-2 rounded-lg text-gray-600 hover:text-brand hover:bg-gray-100 transition-all duration-200 relative z-50">
            <svg id="menuIcon" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="closeIcon" class="w-6 h-6 hidden transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile nav - Modern slide-in menu -->
    <div id="mobileMenu" class="fixed inset-0 z-40 md:hidden pointer-events-none">
        <!-- Backdrop -->
        <div id="menuBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
        
        <!-- Menu panel -->
        <div id="menuPanel" class="absolute top-0 right-0 h-full w-72 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex flex-col h-full pt-20 pb-6 px-6">
                <!-- Navigation links -->
                <nav class="flex-1 space-y-1">
                    @foreach($navItems as $item)
                    <a href="{{ $item->url }}" class="mobile-nav-link block py-3 px-4 text-gray-700 hover:text-brand hover:bg-brand-light rounded-lg transition-all duration-200 font-medium">
                        {{ $item->label }}
                    </a>
                    @endforeach
                </nav>
                
                <!-- CTA Button -->
                <a href="{{ $settings['nav_cta_link'] ?? '#contact' }}"
                   class="block mt-4 bg-brand text-white text-center py-3 px-6 rounded-full font-semibold hover:bg-brand-dark transition-all duration-200 shadow-lg hover:shadow-xl">
                    {{ $settings['nav_cta_text'] ?? 'Free Consultation' }}
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ─── HERO SLIDER ───────────────────────────────────────────────────── -->
<section id="hero-slider" class="relative text-white">

    @foreach($heroSlides as $i => $slide)
    <div class="slide {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}"
         style="background-image: url('{{ Str::startsWith($slide->image_url, '/') || Str::startsWith($slide->image_url, 'http') ? $slide->image_url : asset('storage/' . $slide->image_url) }}');">
        <div class="slide-overlay"></div>
        <div class="absolute inset-0 flex items-center z-10">
            <div class="max-w-7xl mx-auto w-full px-8 sm:px-14 lg:px-20">
                <div class="max-w-lg">
                    @if($slide->title || $slide->highlight)
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-3">
                        {{ $slide->title }}
                        @if($slide->highlight)<span class="text-orange-400">{{ $slide->highlight }}</span>@endif
                    </h1>
                    @endif
                    @if($slide->subtitle)
                    <p class="text-white/80 text-base mb-7">{{ $slide->subtitle }}</p>
                    @endif
                    @if($slide->btn1_text || $slide->btn2_text)
                    <div class="flex flex-wrap gap-4 items-center">
                        @if($slide->btn1_text)
                        <a href="{{ $slide->btn1_link ?? '#' }}"
                           class="bg-orange-500 hover:bg-orange-400 text-white font-semibold px-6 py-2.5 rounded-full transition text-sm">
                            {{ $slide->btn1_text }}
                        </a>
                        @endif
                        @if($slide->btn2_text)
                        <a href="{{ $slide->btn2_link ?? '#' }}"
                           class="text-white/90 hover:text-white font-medium text-sm transition underline-offset-4 hover:underline">
                            {{ $slide->btn2_text }}
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Arrow buttons -->
    <button id="prevBtn" class="slider-arrow" aria-label="Previous">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button id="nextBtn" class="slider-arrow" aria-label="Next">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- Dot indicators -->
    <div id="slider-dots" class="absolute bottom-7 left-1/2 -translate-x-1/2 z-20 flex gap-2">
        @foreach($heroSlides as $i => $slide)
        <button class="slider-dot {{ $i === 0 ? 'active' : '' }}" data-dot="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
        @endforeach
    </div>

</section>

<!-- ─── SERVICES ──────────────────────────────────────────────────────── -->
<section id="services" class="py-24 bg-gray-50 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="text-brand font-semibold text-sm uppercase tracking-widest">What We Offer</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold mt-2">Our Visa Services</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">From student visas to permanent residency, we cover every immigration pathway.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['🎓','Student Visa','University admissions and student visa applications for top destinations including USA, UK, Canada, and Australia.'],
                ['💼','Work Visa','Skilled worker, intra-company transfer, and employer-sponsored work permits handled end-to-end.'],
                ['✈️','Tourist Visa','Fast-track tourist and visitor visa processing with high approval rates.'],
                ['🏠','Permanent Residency','PR pathways including Express Entry, Points-Based Systems, and family sponsorship.'],
                ['👨‍👩‍👧','Family Reunification','Spouse, dependent, and family reunion visa applications with compassionate guidance.'],
                ['🏢','Business Visa','Investor, entrepreneur, and business visitor visas for global expansion.'],
            ] as $s)
            <div class="bg-white rounded-2xl p-8 shadow-sm card-hover" data-aos="fade-up">
                <div class="text-4xl mb-4">{{ $s[0] }}</div>
                <h3 class="text-lg font-bold mb-2">{{ $s[1] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $s[2] }}</p>
                <a href="#contact" class="inline-block mt-5 text-brand font-semibold text-sm hover:underline">Apply Now →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ─── PROCESS ───────────────────────────────────────────────────────── -->
<section id="process" class="py-24 px-4 bg-white">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="text-brand font-semibold text-sm uppercase tracking-widest">How It Works</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold mt-2">Simple 4-Step Process</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['01','Free Consultation','Tell us your goals and we assess the best visa pathway for you.'],
                ['02','Document Prep','We guide you through every document required for a strong application.'],
                ['03','Application Filing','Our experts file your application accurately and on time.'],
                ['04','Visa Approval','We track your case and notify you the moment your visa is approved.'],
            ] as $step)
            <div class="text-center" data-aos="fade-up">
                <div class="w-14 h-14 rounded-full bg-brand-light text-brand font-extrabold text-lg flex items-center justify-center mx-auto mb-4">
                    {{ $step[0] }}
                </div>
                <h3 class="font-bold text-base mb-2">{{ $step[1] }}</h3>
                <p class="text-gray-500 text-sm">{{ $step[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ─── WHY US ─────────────────────────────────────────────────────────── -->
<section id="why-us" class="py-24 px-4 bg-brand text-white">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
        <div data-aos="fade-right">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Why Choose Us</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold mt-3 mb-6">We Make Immigration Simple</h2>
            <p class="text-blue-100 mb-8 leading-relaxed">
                With over 15 years of experience and a team of certified immigration lawyers and consultants,
                Erazehan International has helped thousands of individuals and families achieve their immigration goals.
            </p>
            <ul class="space-y-4">
                @foreach([
                    'RCIC & OISC certified consultants',
                    'Transparent pricing — no hidden fees',
                    'Dedicated case manager for every client',
                    'Real-time application tracking portal',
                    '98% visa approval success rate',
                ] as $point)
                <li class="flex items-center gap-3 text-sm">
                    <span class="w-5 h-5 rounded-full bg-gold flex-shrink-0 flex items-center justify-center text-gray-900 font-bold text-xs">✓</span>
                    {{ $point }}
                </li>
                @endforeach
            </ul>
        </div>

        <div class="grid grid-cols-2 gap-6" data-aos="fade-left">
            @foreach([
                ['🌍','Global Network','Partnerships with embassies and institutions in 50+ countries.'],
                ['⚡','Fast Processing','Expedited services available for urgent visa requirements.'],
                ['🔒','Secure & Private','Your documents and data are handled with strict confidentiality.'],
                ['📞','24/7 Support','Round-the-clock support via chat, email, and phone.'],
            ] as $f)
            <div class="bg-white/10 rounded-2xl p-6">
                <div class="text-3xl mb-3">{{ $f[0] }}</div>
                <h4 class="font-bold mb-1">{{ $f[1] }}</h4>
                <p class="text-blue-100 text-xs leading-relaxed">{{ $f[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ─── TESTIMONIALS ──────────────────────────────────────────────────── -->
<section id="testimonials" class="py-24 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="text-brand font-semibold text-sm uppercase tracking-widest">Client Stories</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold mt-2">What Our Clients Say</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['Sarah M.','Canada PR','Erazehan International made the entire PR process stress-free. My case manager was always available and kept me updated every step of the way. Got my PR in 8 months!','🇨🇦'],
                ['Ahmed K.','UK Student Visa','I was rejected once before finding Erazehan International. They identified the issues, helped me reapply, and I got my student visa within 3 weeks. Highly recommend!','🇬🇧'],
                ['Priya R.','Australia Work Visa','Professional, efficient, and genuinely caring team. They handled all my documents and I received my skilled worker visa without any hassle.','🇦🇺'],
            ] as $t)
            <div class="bg-white rounded-2xl p-8 shadow-sm card-hover" data-aos="fade-up">
                <div class="flex items-center gap-1 text-gold mb-4">
                    @for($i=0;$i<5;$i++) ★ @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">"{{ $t[2] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-xl">{{ $t[3] }}</div>
                    <div>
                        <div class="font-bold text-sm">{{ $t[0] }}</div>
                        <div class="text-xs text-gray-400">{{ $t[1] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ─── CONTACT / CTA ─────────────────────────────────────────────────── -->
<section id="contact" class="py-24 px-4 bg-white">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-start">

        <!-- Info -->
        <div data-aos="fade-right">
            <span class="text-brand font-semibold text-sm uppercase tracking-widest">Get In Touch</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold mt-2 mb-4">Book Your Free Consultation</h2>
            <p class="text-gray-500 mb-8 leading-relaxed">
                Fill in the form and one of our certified consultants will reach out within 24 hours to discuss your visa options.
            </p>

            <div class="space-y-5 text-sm">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-brand font-bold">📍</div>
                    <div>
                        <div class="font-semibold">Office</div>
                        <div class="text-gray-500">{{ $settings['address'] ?? '#337, Flat 3-A, Rd-23, Mohakhali DOHS, Dhaka-1206' }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-brand font-bold">📞</div>
                    <div>
                        <div class="font-semibold">Phone</div>
                        <div class="text-gray-500">
                            +880 1877654064 / +880 1611272578<br>
                            +880 1604421474 / +880 1972686069
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-brand font-bold">✉️</div>
                    <div>
                        <div class="font-semibold">Email</div>
                        <div class="text-gray-500">erazehanintl@gmail.com / contact@erazehanintl.com</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div data-aos="fade-left">
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-4 mb-6 text-sm font-medium">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('contact') }}" method="POST" class="bg-gray-50 rounded-2xl p-8 shadow-sm space-y-5">
                @csrf

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">Full Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand @error('name') border-red-400 @enderror" />
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email Address *</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="john@email.com"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand @error('email') border-red-400 @enderror" />
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">Phone Number</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+1 234 567 8900"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand" />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">Visa Type *</label>
                        <select name="service"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand @error('service') border-red-400 @enderror">
                            <option value="">Select a service</option>
                            @foreach(['Student Visa','Work Visa','Tourist Visa','Permanent Residency','Family Reunification','Business Visa'] as $opt)
                            <option value="{{ $opt }}" {{ old('service') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>
                        @error('service')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Message *</label>
                    <textarea name="message" rows="4" placeholder="Tell us about your situation and goals..."
                              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit"
                        class="w-full bg-brand text-white font-bold py-4 rounded-xl hover:bg-brand-dark transition text-sm tracking-wide">
                    Send Message — It's Free
                </button>
            </form>
        </div>
    </div>
</section>

<!-- ─── FOOTER ────────────────────────────────────────────────────────── -->
<footer class="bg-slate-50 text-gray-500 py-12 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-10">

        <!-- Brand -->
        <div>
            @if(!empty($settings['footer_logo_url']))
                <img src="{{ $settings['footer_logo_url'] }}" alt="{{ $settings['logo_text'] ?? 'Logo' }}" class="h-10 mb-3 object-contain"/>
            @else
                <div class="text-gray-800 font-bold text-lg mb-3">{{ $settings['logo_text'] ?? 'Erazehan International' }}</div>
            @endif
            <p class="text-sm leading-relaxed text-gray-500">{{ $settings['footer_about'] ?? '' }}</p>
        </div>

        <!-- Services -->
        <div>
            <div class="text-gray-800 font-semibold mb-3 text-sm">Services</div>
            <ul class="space-y-2 text-sm">
                @foreach($footerLinks['services'] ?? [] as $link)
                @if($link->active)
                <li><a href="{{ $link->url }}" class="hover:text-brand transition">{{ $link->label }}</a></li>
                @endif
                @endforeach
            </ul>
        </div>

        <!-- Company -->
        <div>
            <div class="text-gray-800 font-semibold mb-3 text-sm">Company</div>
            <ul class="space-y-2 text-sm">
                @foreach($footerLinks['company'] ?? [] as $link)
                @if($link->active)
                <li><a href="{{ $link->url }}" class="hover:text-brand transition">{{ $link->label }}</a></li>
                @endif
                @endforeach
            </ul>
        </div>

        <!-- Social -->
        <div>
            <div class="text-gray-800 font-semibold mb-3 text-sm">Follow Us</div>
            <div class="flex gap-3 flex-wrap">
                @foreach($footerLinks['social'] ?? [] as $link)
                @if($link->active)
                @php
                    $name = strtolower($link->label);
                    $color = match(true) {
                        str_contains($name,'facebook')  => 'hover:bg-blue-600',
                        str_contains($name,'instagram') => 'hover:bg-pink-600',
                        str_contains($name,'twitter') || str_contains($name,'x.com') => 'hover:bg-black',
                        str_contains($name,'linkedin')  => 'hover:bg-blue-700',
                        str_contains($name,'youtube')   => 'hover:bg-red-600',
                        str_contains($name,'tiktok')    => 'hover:bg-black',
                        str_contains($name,'whatsapp')  => 'hover:bg-green-600',
                        default => 'hover:bg-blue-600',
                    };
                @endphp
                <a href="{{ $link->url }}" target="_blank" rel="noopener"
                   class="w-10 h-10 rounded-full bg-gray-100 {{ $color }} flex items-center justify-center transition" title="{{ $link->label }}">
                    @if(str_contains($name,'facebook'))
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    @elseif(str_contains($name,'instagram'))
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="white" stroke-width="2"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="white"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>
                    @elseif(str_contains($name,'twitter') || str_contains($name,'x.com') || $name === 'x')
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    @elseif(str_contains($name,'linkedin'))
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                    @elseif(str_contains($name,'youtube'))
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#111"/></svg>
                    @elseif(str_contains($name,'whatsapp'))
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    @elseif(str_contains($name,'tiktok'))
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.75a4.85 4.85 0 01-1.01-.06z"/></svg>
                    @else
                        <svg class="w-5 h-5 fill-gray-600 group-hover:fill-white transition" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93V18c0-.55.45-1 1-1s1 .45 1 1v1.93A8.01 8.01 0 014.07 13H6c.55 0 1 .45 1 1s-.45 1-1 1H4.07A8.01 8.01 0 0111 19.93z"/></svg>
                    @endif
                </a>
                @endif
                @endforeach
            </div>

            <!-- We Operate In -->
            <div class="mt-5">
                <div class="text-gray-800 font-semibold mb-3 text-sm">We Operate In</div>
                <!-- Slider track -->
                <div class="relative overflow-hidden">
                    <div id="countryTrack" class="flex gap-2 transition-transform duration-500 ease-in-out">
                        @foreach([
                            ['🇩🇪','Germany'],['🇫🇷','France'],['🇮🇹','Italy'],['🇪🇸','Spain'],
                            ['🇵🇹','Portugal'],['🇳🇱','Netherlands'],['🇧🇪','Belgium'],['🇦🇹','Austria'],
                            ['🇵🇱','Poland'],['🇷🇴','Romania'],['🇨🇿','Czech Rep.'],['🇭🇺','Hungary'],
                            ['🇸🇪','Sweden'],['🇳🇴','Norway'],['🇩🇰','Denmark'],['🇫🇮','Finland'],
                            ['🇨🇭','Switzerland'],['🇬🇷','Greece'],['🇭🇷','Croatia'],['🇸🇰','Slovakia'],
                        ] as [$flag, $country])
                        <div class="flex-shrink-0 flex items-center gap-1.5 bg-white border border-gray-200 rounded-xl px-3 py-2 shadow-sm">
                            <span class="text-xl leading-none">{{ $flag }}</span>
                            <span class="text-xs text-gray-700 font-medium whitespace-nowrap">{{ $country }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Dot controls -->
                <div id="countryDots" class="flex gap-1.5 mt-3 flex-wrap"></div>
            </div>
        </div>
    </div>
    </div>

    <div class="border-t border-gray-200 pt-6 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                <span class="text-gray-400">© {{ date('Y') }} {{ $settings['footer_copyright'] ?? 'Erazehan International. All rights reserved.' }}</span>
                <span class="text-gray-400">Design &amp; Developed By <a href="https://alphainno.com" target="_blank" rel="noopener" class="text-orange-500 hover:text-orange-400 font-semibold transition">Alphainno</a></span>
            </div>
        </div>
    </div>
</footer>

<!-- AOS + mobile menu + slider script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 60 });

    // Modern mobile menu toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuPanel = document.getElementById('menuPanel');
    const menuBackdrop = document.getElementById('menuBackdrop');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    
    let isMenuOpen = false;

    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            // Open menu
            mobileMenu.classList.remove('pointer-events-none');
            menuBackdrop.classList.remove('opacity-0');
            menuBackdrop.classList.add('opacity-100');
            menuPanel.classList.remove('translate-x-full');
            menuPanel.classList.add('translate-x-0');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            // Close menu
            menuBackdrop.classList.remove('opacity-100');
            menuBackdrop.classList.add('opacity-0');
            menuPanel.classList.remove('translate-x-0');
            menuPanel.classList.add('translate-x-full');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
            setTimeout(() => {
                mobileMenu.classList.add('pointer-events-none');
            }, 300);
        }
    }

    menuBtn.addEventListener('click', toggleMenu);
    menuBackdrop.addEventListener('click', toggleMenu);
    
    // Close menu when clicking nav links
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (isMenuOpen) toggleMenu();
        });
    });

    // ── Country Slider ──
    (function () {
        const track    = document.getElementById('countryTrack');
        const dotsWrap = document.getElementById('countryDots');
        if (!track) return;

        const items    = track.children;
        const perPage  = 2;
        const total    = items.length;
        const pages    = Math.ceil(total / perPage);
        let current    = 0;

        // Build dots
        for (let i = 0; i < pages; i++) {
            const d = document.createElement('button');
            d.className = 'w-5 h-1.5 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-blue-600 w-6' : 'bg-gray-300');
            d.addEventListener('click', () => goTo(i));
            dotsWrap.appendChild(d);
        }

        function goTo(page) {
            current = page;
            // Calculate offset: sum widths of items before this page
            let offset = 0;
            for (let i = 0; i < page * perPage && i < total; i++) {
                offset += items[i].offsetWidth + 8; // 8 = gap-2
            }
            track.style.transform = `translateX(-${offset}px)`;
            // Update dots
            Array.from(dotsWrap.children).forEach((d, i) => {
                d.className = 'h-1.5 rounded-full transition-all duration-300 ' + (i === page ? 'bg-blue-600 w-6' : 'bg-gray-300 w-5');
            });
        }

        // Auto-advance
        setInterval(() => goTo((current + 1) % pages), 2500);
    })();
    const slides = document.querySelectorAll('.slide');
    const dots   = document.querySelectorAll('.slider-dot');
    let current  = 0;
    let timer;

    function goTo(n) {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (n + slides.length) % slides.length;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    function startAuto() {
        timer = setInterval(() => goTo(current + 1), 5000);
    }

    function resetAuto() {
        clearInterval(timer);
        startAuto();
    }

    document.getElementById('nextBtn').addEventListener('click', () => { goTo(current + 1); resetAuto(); });
    document.getElementById('prevBtn').addEventListener('click', () => { goTo(current - 1); resetAuto(); });

    dots.forEach(dot => {
        dot.addEventListener('click', () => { goTo(+dot.dataset.dot); resetAuto(); });
    });

    startAuto();
</script>
</body>
</html>
