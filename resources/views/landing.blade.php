<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GlobalVisa Consultancy – Your Trusted Immigration Partner</title>
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
<header class="fixed inset-x-0 top-0 z-50 bg-white/90 backdrop-blur shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

        <!-- Logo -->
        <a href="#" class="flex items-center gap-2 font-bold text-xl text-brand">
            @if(!empty($settings['logo_url']))
                <img src="{{ $settings['logo_url'] }}" alt="{{ $settings['logo_text'] ?? 'Logo' }}" class="h-9 w-auto object-contain"/>
            @else
                <svg class="w-7 h-7 text-gold" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93V18c0-.55.45-1 1-1s1 .45 1 1v1.93A8.01 8.01 0 0 1 4.07 13H6c.55 0 1 .45 1 1s-.45 1-1 1H4.07A8.01 8.01 0 0 1 11 19.93zM4.07 11H6c.55 0 1-.45 1-1s-.45-1-1-1H4.07A8.01 8.01 0 0 1 11 4.07V6c0 .55.45 1 1 1s1-.45 1-1V4.07A8.01 8.01 0 0 1 19.93 11H18c-.55 0-1 .45-1 1s.45 1 1 1h1.93A8.01 8.01 0 0 1 13 19.93V18c0-.55-.45-1-1-1s-1 .45-1 1v1.93A8.01 8.01 0 0 1 4.07 13H6"/>
                </svg>
                {{ $settings['logo_text'] ?? 'GlobalVisa' }}
            @endif
        </a>

        <!-- Desktop nav -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
            @foreach($navItems as $item)
            <a href="{{ $item->url }}" class="hover:text-brand transition">{{ $item->label }}</a>
            @endforeach
        </nav>

        <!-- CTA -->
        <a href="{{ $settings['nav_cta_link'] ?? '#contact' }}"
           class="hidden md:inline-flex items-center gap-2 bg-brand text-white text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-brand-dark transition">
            {{ $settings['nav_cta_text'] ?? 'Free Consultation' }}
        </a>

        <!-- Mobile toggle -->
        <button id="menuBtn" class="md:hidden p-2 rounded text-gray-600 hover:text-brand">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile nav -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t px-4 pb-4 space-y-2 text-sm font-medium text-gray-700">
        @foreach($navItems as $item)
        <a href="{{ $item->url }}" class="block py-2 hover:text-brand">{{ $item->label }}</a>
        @endforeach
        <a href="{{ $settings['nav_cta_link'] ?? '#contact' }}"
           class="block mt-2 bg-brand text-white text-center py-2 rounded-full">
            {{ $settings['nav_cta_text'] ?? 'Free Consultation' }}
        </a>
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
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-3">
                        {{ $slide->title }} <span class="text-orange-400">{{ $slide->highlight }}</span>
                    </h1>
                    <p class="text-white/80 text-base mb-7">{{ $slide->subtitle }}</p>
                    <div class="flex flex-wrap gap-4 items-center">
                        <a href="{{ $slide->btn1_link }}"
                           class="bg-orange-500 hover:bg-orange-400 text-white font-semibold px-6 py-2.5 rounded-full transition text-sm">
                            {{ $slide->btn1_text }}
                        </a>
                        <a href="{{ $slide->btn2_link }}"
                           class="text-white/90 hover:text-white font-medium text-sm transition underline-offset-4 hover:underline">
                            {{ $slide->btn2_text }}
                        </a>
                    </div>
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
                GlobalVisa has helped thousands of individuals and families achieve their immigration goals.
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
                ['Sarah M.','Canada PR','GlobalVisa made the entire PR process stress-free. My case manager was always available and kept me updated every step of the way. Got my PR in 8 months!','🇨🇦'],
                ['Ahmed K.','UK Student Visa','I was rejected once before finding GlobalVisa. They identified the issues, helped me reapply, and I got my student visa within 3 weeks. Highly recommend!','🇬🇧'],
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
                        <div class="text-gray-500">123 Immigration Ave, Suite 400, Toronto, ON M5V 2T6</div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-brand font-bold">📞</div>
                    <div>
                        <div class="font-semibold">Phone</div>
                        <div class="text-gray-500">+1 (800) 555-VISA</div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-brand font-bold">✉️</div>
                    <div>
                        <div class="font-semibold">Email</div>
                        <div class="text-gray-500">info@globalvisa.com</div>
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
<footer class="bg-gray-900 text-gray-400 py-12 px-4">
    <div class="max-w-7xl mx-auto grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-10">
        <div>
            <div class="text-white font-bold text-lg mb-3">GlobalVisa</div>
            <p class="text-sm leading-relaxed">Your trusted immigration partner since 2009. Certified, experienced, and dedicated to your success.</p>
        </div>
        <div>
            <div class="text-white font-semibold mb-3 text-sm">Services</div>
            <ul class="space-y-2 text-sm">
                @foreach(['Student Visa','Work Visa','Tourist Visa','Permanent Residency','Business Visa'] as $s)
                <li><a href="#services" class="hover:text-white transition">{{ $s }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <div class="text-white font-semibold mb-3 text-sm">Company</div>
            <ul class="space-y-2 text-sm">
                @foreach(['About Us','Our Team','Success Stories','Blog','Careers'] as $l)
                <li><a href="#" class="hover:text-white transition">{{ $l }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <div class="text-white font-semibold mb-3 text-sm">Follow Us</div>
            <div class="flex gap-3">
                @foreach(['Facebook','Twitter','LinkedIn','Instagram'] as $social)
                <a href="#" class="w-9 h-9 rounded-full bg-gray-700 hover:bg-brand flex items-center justify-center text-xs transition">
                    {{ substr($social,0,2) }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800 pt-6 text-center text-xs">
        © {{ date('Y') }} GlobalVisa Consultancy. All rights reserved. &nbsp;|&nbsp;
        <a href="#" class="hover:text-white">Privacy Policy</a> &nbsp;|&nbsp;
        <a href="#" class="hover:text-white">Terms of Service</a>
    </div>
</footer>

<!-- AOS + mobile menu + slider script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 60 });

    document.getElementById('menuBtn').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // ── Hero Slider ──
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
