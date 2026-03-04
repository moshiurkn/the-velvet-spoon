@include('home.navbar')

{{-- Hero Section --}}
<header id="home" class="relative pt-32 pb-28 lg:pt-48 lg:pb-32 overflow-hidden bg-slate-900">
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

    {{-- Clean wave transition --}}
    <div class="absolute bottom-0 left-0 w-full" style="line-height:0;overflow:hidden;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none"
            style="width:100%;height:80px;display:block;">
            <path d="M0,80 L0,40 C180,80 360,10 540,35 C720,60 900,10 1080,30 C1260,50 1380,20 1440,40 L1440,80 Z"
                fill="#f8fafc" />
        </svg>
    </div>
</header>