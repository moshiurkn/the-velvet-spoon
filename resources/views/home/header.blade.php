@include('home.navbar')

{{-- Hero Section --}}
<header id="home" class="relative pt-32 pb-32 lg:pt-48 lg:pb-32 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 opacity-40 mix-blend-multiply">
        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=2000&auto=format&fit=crop"
            alt="Restaurant Interior" class="w-full h-full object-cover" />
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pb-12 md:pb-0">
        <span
            class="inline-block py-1 px-3 rounded-full bg-red-600/20 text-red-400 font-semibold text-sm tracking-wider uppercase mb-4 border border-red-500/30 backdrop-blur-sm">Welcome
            to our restaurant</span>

        <h1
            class="heading-font text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-lg leading-tight lg:leading-none">
            The Velvet Spoon
        </h1>

        <p class="mt-4 text-xl md:text-2xl text-slate-200 max-w-3xl mx-auto font-light mb-10 drop-shadow-md px-2">
            Always Fresh & Delightful. Experience the finest culinary journey featuring exquisite flavors and remarkable
            ambiance.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center px-6 sm:px-0">
            <a href="#blog"
                class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 shadow-[0_0_20px_rgba(220,38,38,0.4)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)] transform hover:-translate-y-1 w-full sm:w-auto">
                Explore Menu
            </a>
            <a href="#book-table"
                class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 transform hover:-translate-y-1 w-full sm:w-auto">
                Book a Table
            </a>
        </div>
    </div>

    {{-- Decorative bottom wave --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-12 md:h-24" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118,130.85,133.56,203.4,129.21,241.67,126.92,280.4,116.14,321.39,56.44Z"
                class="fill-slate-50"></path>
        </svg>
    </div>
</header>